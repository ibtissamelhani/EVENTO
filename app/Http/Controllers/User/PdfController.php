<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventUser;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    /**
     * generate ticket
     */
    
    public function generatePdf(EventUser $eventUser){
    $pdf = PDF::loadView('ticket', ['eventUser' => $eventUser]);
    return $pdf->download();
    }

    /**
     * sending ticket in email
     */

     public function sendTicket(EventUser $eventUser){
        $pdf = PDF::loadView('ticket', ['eventUser' => $eventUser]);
        Mail::send('ticket',['eventUser' => $eventUser], function($message) use($pdf){
            $message->to("sibti587@gmail.com")
            ->subject("event ticket")
            ->attachData($pdf->output(), "ticket.pdf");
        });
        return back()->with('error', 'done');
     }


}
