<?php

namespace App\Http\Controllers\Front;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
       public function index( )
    {

        return view('user.contactUs.index');
    }
       public function store(ContactRequest $request)
    {
        $data = $request->validated();

        Contact::create($data);

        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }
}
