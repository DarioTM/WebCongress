<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Certificado extends Mailable
{
    use Queueable, SerializesModels;


    private $name, $ponencia, $fecha;
    
    private $asunto = 'Certificado';
    
    

    public function setSubject($subject)
    {
        $this->asunto = $subject;
    }



    public function __construct($name, $ponencia, $fecha)
    {
        $this->name = $name;
        $this->ponencia = $ponencia;
        $this->fecha    = $fecha;
    }




    public function build()
    {
        
        
        
        
        
        return $this->view('emails.certificado')->subject($this->asunto)->with(['name' => $this->name, 'ponencia' => $this->ponencia , 'fecha' => $this->fecha]);
    }
}
