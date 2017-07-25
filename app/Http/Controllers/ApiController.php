<?php 

namespace App\Http\Controllers;

use App\TestPin;

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

        $this->push('my-channel', 'my-event', $data);

        return response()->json([$data]);
    }
}