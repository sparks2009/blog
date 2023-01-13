<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{

    public function __invoke(Newsletter $newsletter){

        

        request()->validate(['email' => 'required|email']);  
       
        try{
            
            $newsletter->subscribe(request('email'));
            
        } catch (\Exception $e) {
            
            throw ValidationException::withMessages([
            
                'email' => 'This email could not be added to the mailing list',
            ]);

        }

        return redirect('/')->with('success', 'You are now signed up to our newsletter');


    }
}
