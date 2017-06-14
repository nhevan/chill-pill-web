<?php 

namespace App\Http\Controllers;

class ApiController extends Controller
{
	public function push($box_serial_no, $cell_no, $pin_no)
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

        $data['cell'] = $cell_no;
        $data['pin'] = $pin_no;
        $pusher->trigger('my-channel', 'my-event', $data);
	}
}