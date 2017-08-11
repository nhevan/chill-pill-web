<?php

namespace App\Mail;

use App\PatientMetadata;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MissedDoseEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $patient;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(PatientMetadata $patient)
    {
        $this->patient = $patient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $patient_name = $this->patient->user->name;
        // dd($patient_name);
        return $this->from(['address' => 'noreply@chillpill.com', 'name' => 'Chill Pill'])
                    ->subject("$patient_name missed a dose." )
                    ->markdown('patient.dose-miss-email', ['patient' => $this->patient]);
    }
}
