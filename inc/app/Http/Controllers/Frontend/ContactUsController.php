<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;
use App\Models\ContactInfo;

class ContactUsController extends Controller
{
    public function showContactUsForm()
    {
        $info = ContactInfo::first();
    	return view('frontend.pages.contact-us-form', compact('info'));
    }
    public function contactUsSubmit(Request $request)
    {
        try{
            $contact = new ContactUs();
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone_number = $request->phone_number;
            $contact->website = $request->website;
            $contact->message = $request->message;

            $contact->save();
        } catch (Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success','message'=>'Thank you for being touched with us.']);
        return redirect()->back();
    }
}
