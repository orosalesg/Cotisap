<?php


/**
*
*
* @author Omar Rosales
*/

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class General extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        $emails = ['omar.rosales@mbr.mx','omargerardoguerrero@gmail.com','jfmedina@mbrhosting.com',$request->creador];
        return $this->view('mail',['cuerpo'=>$request->msg])->to($emails);
    }
}
