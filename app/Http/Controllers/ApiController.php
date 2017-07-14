<?php 

namespace App\Http\Controllers;

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

        $this->push('my-channel', 'my-event', $data);

        return response()->json([$data]);
    }
}