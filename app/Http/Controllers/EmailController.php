<?php

namespace App\Http\Controllers;

use App\Mail\SendConfirmation;
use App\Mail\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class EmailController extends Controller
{
    public function send(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'text' => 'required|string|max:1800',
        ]);

        $letter = array_map('strip_tags', $validatedData);

        Mail::to('iveriistadzari@gmail.com')->send(new SendEmail($letter));
        Mail::to($letter['email'])->send(new SendConfirmation());

        return redirect()->back();
    }
}
