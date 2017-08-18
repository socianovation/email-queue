<?php

namespace App\Http\Controllers;

use Mookofe\Tail\Facades\Tail;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function send(Request $request){

        $request = $request->all();

        $data = [];
        $data['subject'] = $request['subject'];
        $data['content'] = $request['content'];
        $data['from'] = $request['from'];
        $data['to'] = $request['to'];

        Tail::add('send-email', json_encode($data));

        return response()
            ->json($data);
    }
}
