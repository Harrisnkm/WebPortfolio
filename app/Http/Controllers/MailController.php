<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ContactMe;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function contactForm(Request $request){


        Mail::to("harrisn.km@gmail.com")->send(new ContactMe($request->all()));
    }
}
