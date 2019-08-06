<?php

namespace App\Http\Controllers;

use app\Mail\Example;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');

    }

    /**
     * Sends an example email.
     * 
     * @return \Illuminate\Http\Response
     */
    public function send()
    {

        Mail::send(new Example());

        return view('mail.send');

    }

}
