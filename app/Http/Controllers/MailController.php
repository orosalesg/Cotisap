<?php


/**
* 
*
* @author GerardoSteven (Steven0110)
*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\General;
use Mail;

class MailController extends Controller{

    public static function send(){
        Mail::send(new General());
    }
}
