<?php

namespace App\Actions;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class contactActions
{
    public function contactUs (Request $request){



        $contact = Contact::create([
            'name' => $request->name,
            'email'=>$request->email,
            'message'=> $request->message,
        ]);

        return $contact;


    }
}
