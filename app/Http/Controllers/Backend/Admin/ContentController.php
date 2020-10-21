<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;
use App\Models\ContactUs;

class ContentController extends Controller
{
    public function updateContactInfo()
    {
        $info = ContactInfo::first();
        return view('backend.pages.content.contactInfo',compact('info'));
    }
    public function updateContactInfoSubmit(Request $request)
    {
        
        $request->validate([
            'email_1'=>'email',
            'email_2'=>'email',
            'supportEmail1'=>'email',
            'supportEmail2'=>'email',
            'notification_email'=>'email',
        ]);
        try{
            
            $info = ContactInfo::first() ?? new ContactInfo(); 
            $info->email_1 = $request->email_1 ?? $info->email_1;
            $info->email_2 = $request->email_2 ?? $info->email_2;
            $info->phone_1 = $request->phone_1 ?? $info->phone_1;
            $info->phone_2 = $request->phone_2 ?? $info->phone_2;
            $info->support_email_1 = $request->support_email_1 ?? $info->support_email_1;
            $info->support_email_2 = $request->support_email_2 ?? $info->support_email_2;
            $info->langitute = $request->langitute ?? $info->langitute;
            $info->latitute = $request->latitute ?? $info->latitute;
            $info->address = $request->address ?? $info->address;
            $info->notification_email = $request->notification_email ?? $info->notification_email;

            $info->save();
        } catch (Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong.']);
            return redirect()->back();
        }
        session(['type'=>'success','message'=>'Contact information updated successfully.']);
        return redirect()->back();

    }
    public function seeAllQuiries()
    {
        $quiries = ContactUs::all();
        return view('backend.pages.content.contacts', compact('quiries'));
    }
    public function deleteContact($contact_id)
    {
        try{
            ContactUs::findOrFail($contact_id)->delete();
        } catch (Exception $e) {
            session(['type'=>'danger','message'=>'Something went wrong.']);
            return redirect()->back();
        }   
        session(['type'=>'success','message'=>'Deleted successfully']);
        return redirect()->back();
    }
}
