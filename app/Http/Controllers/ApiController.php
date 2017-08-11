<?php 

namespace App\Http\Controllers;

use App\TestPin;
use Carbon\Carbon;
use App\PatientMetadata;

class ApiController extends Controller
{
	public function pushToPin($box_serial_no, $cell_no, $pin_no)
	{
        $data['cell'] = $cell_no;
        $data['pin'] = $pin_no;

        $this->push('my-channel', 'my-event', $data);
	}

    public function push($channel, $event, $data)
    {
        $options = array(
            'cluster' => 'ap1',
            'encrypted' => true
          );
        $pusher = new \Pusher(
            'c6c89850cbcdfffb572e',
            'c8c4dd8335745025d697',
            '311509',
            $options
          );

        $pusher->trigger($channel, $event, $data);
    }

    public function getCurrentDose()
    {
        $patient = PatientMetadata::find(1);
        
        $next_doze_time = $this->getDozeTime($patient);

        $medicine_bag = $this->getAllMedcinesX($patient);
        $filtered_medicines = $this->filterMedicines($medicine_bag);
        $medicine_with_cell_no = $this->findCellNumbersX($patient, $filtered_medicines);

        $current_dose_medicines = $medicine_with_cell_no->filter(function ($medicine) use ($next_doze_time) {
            if ($next_doze_time['meal_time'] == "at_breakfast") {
                return ($medicine->is_after_meal == $next_doze_time['is_after_meal']) && ($medicine->at_breakfast == 1);
            }

            if ($next_doze_time['meal_time'] == "at_lunch") {
                return ($medicine->is_after_meal == $next_doze_time['is_after_meal']) && ($medicine->at_lunch == 1);
            }

            if ($next_doze_time['meal_time'] == "at_dinner") {
                return ($medicine->is_after_meal == $next_doze_time['is_after_meal']) && ($medicine->at_dinner == 1);
            }
        });

        return $this->sendCurrentDosePush($current_dose_medicines->flatten(), $next_doze_time);
    }

    public function sendCurrentDosePush($current_dose_medicines, $meal_time)
    {
        $data['type'] = "Current Dose";
        $data['message'] = "Current dose from server -server";
        $data['meal_time'] = $meal_time;

        $tmp_pins = TestPin::find(1);

        $data['cell1'] = 0;
        $data['cell2'] = 0;
        $data['cell3'] = 0;
        $data['cell4'] = 0;
        $data['cell5'] = 0;
        $data['cell6'] = 0;
        $data['cell7'] = 0;
        $data['cell8'] = 0;
        $data['cell9'] = 0;

        foreach ($current_dose_medicines as $medicine) {
            if ($medicine->cell_number) {
                $cell_no = "cell".$medicine->cell_number;
                $data[$cell_no] = 1;
            }else{
                $data["warning"] = "$medicine->name is not assigned to any cell in chill pill.";
            }
        }

        $this->push('my-channel', 'my-event', $data);

        return response()->json([$data]);
    }

    public function getDozeTime($patient)
    {
        $current_time = Carbon::now();

        $before_breakfast = Carbon::parse($patient->breakfast_at)->subMinutes(30);
        $after_breakfast = Carbon::parse($patient->breakfast_at)->addMinutes(30);

        $before_lunch = Carbon::parse($patient->lunch_at)->subMinutes(30);
        $after_lunch = Carbon::parse($patient->lunch_at)->addMinutes(30);

        $before_dinner = Carbon::parse($patient->dinner_at)->subMinutes(30);
        $after_dinner = Carbon::parse($patient->dinner_at)->addMinutes(30);
        
        
        $proximity_to_before_breakfast = abs(($current_time->diffInMinutes($before_breakfast, false) / 30));
        $proximity_to_after_breakfast =  abs($current_time->diffInMinutes($after_breakfast, false) / 30);
        $proximity_to_before_lunch =  abs($current_time->diffInMinutes($before_lunch, false) / 30);
        $proximity_to_after_lunch =  abs($current_time->diffInMinutes($after_lunch, false) / 30);
        $proximity_to_before_dinner =  abs($current_time->diffInMinutes($before_dinner, false) / 30);
        $proximity_to_after_dinner =  abs($current_time->diffInMinutes($after_dinner, false) / 30);

        $initiate_time_diff = 1000;
        $meal_time['is_after_meal'] = 0;
        $meal_time['meal_time'] = "at_breakfast";

        if($proximity_to_before_breakfast < $initiate_time_diff ){
            $initiate_time_diff = $proximity_to_before_breakfast;
            $meal_time['is_after_meal'] = 0;
            $meal_time['meal_time'] = "at_breakfast";
        }
        if($proximity_to_after_breakfast < $initiate_time_diff ){
            $initiate_time_diff = $proximity_to_after_breakfast;
            $meal_time['is_after_meal'] = 1;
            $meal_time['meal_time'] = "at_breakfast";
        }
        if($proximity_to_before_lunch < $initiate_time_diff ){
            $initiate_time_diff = $proximity_to_before_lunch;
            $meal_time['is_after_meal'] = 0;
            $meal_time['meal_time'] = "at_lunch";
        }
        if($proximity_to_after_lunch < $initiate_time_diff ){
            $initiate_time_diff = $proximity_to_after_lunch;
            $meal_time['is_after_meal'] = 1;
            $meal_time['meal_time'] = "at_lunch";
        }
        if($proximity_to_before_dinner < $initiate_time_diff ){
            $initiate_time_diff = $proximity_to_before_dinner;
            $meal_time['is_after_meal'] = 0;
            $meal_time['meal_time'] = "at_dinner";
        }
        if($proximity_to_after_dinner < $initiate_time_diff ){
            $initiate_time_diff = $proximity_to_after_dinner;
            $meal_time['is_after_meal'] = 1;
            $meal_time['meal_time'] = "at_dinner";
        }
        
        return $meal_time;
    }

    public function findCellNumbersX($patient, $filtered_medicines)
    {
        $merged = collect();
        $filtered_medicines->each(function($medicine) use ($merged, $patient){
            if ($patient->cell1 == $medicine["name"]) $medicine["cell_number"] = 1;
            if ($patient->cell2 == $medicine["name"]) $medicine["cell_number"] = 2;
            if ($patient->cell3 == $medicine["name"]) $medicine["cell_number"] = 3;
            if ($patient->cell4 == $medicine["name"]) $medicine["cell_number"] = 4;
            if ($patient->cell5 == $medicine["name"]) $medicine["cell_number"] = 5;
            if ($patient->cell6 == $medicine["name"]) $medicine["cell_number"] = 6;
            if ($patient->cell7 == $medicine["name"]) $medicine["cell_number"] = 7;
            if ($patient->cell8 == $medicine["name"]) $medicine["cell_number"] = 8;
            if ($patient->cell9 == $medicine["name"]) $medicine["cell_number"] = 9;
            $merged->push($medicine);
        });

        return $merged;
    }

    public function getAllMedcinesX($patient)
    {
        $medicine_bag = $patient->prescriptions->map(function($prescription){
                        if (sizeof($prescription->medicines)) {
                            return $prescription->medicines;
                        }
                    });

        $merged = $this->mergeMedicinesFromAllPrescriptions($medicine_bag);

        return $merged;
    }

    public function mergeMedicinesFromAllPrescriptions($medicine_bag)
    {
        $merged = collect();
        $medicine_bag->filter()->each(function($medicine) use ($merged){
            $merged->push($medicine);
        });

        return $merged;
    }

    public function filterMedicines($medicine_bag)
    {
        return $medicine_bag->flatten(1)->unique('name');
    }

    public function testGetCurrentDose()
    {
        $data['type'] = "Current Dose";
        $data['message'] = "Current dose from server -server";

        $tmp_pins = TestPin::find(1);

        $data['cell1'] = $tmp_pins->pin1;
        $data['cell2'] = $tmp_pins->pin2;
        $data['cell3'] = $tmp_pins->pin3;
        $data['cell4'] = $tmp_pins->pin4;
        $data['cell5'] = $tmp_pins->pin5;
        $data['cell6'] = $tmp_pins->pin6;
        $data['cell7'] = $tmp_pins->pin7;
        $data['cell8'] = $tmp_pins->pin8;
        $data['cell9'] = $tmp_pins->pin9;

        // $this->push('my-channel', 'my-event', $data);

        return response()->json([$data]);
    }
}