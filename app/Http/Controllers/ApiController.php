<?php 

namespace App\Http\Controllers;

class ApiController extends Controller
{
	public function push($box_serial_no, $cell_no)
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

        $data['message'] = $cell_no;
        $pusher->trigger('my-channel', 'my-event', $data);
	}
}

