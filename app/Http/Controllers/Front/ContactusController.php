<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Mail;
use Validator;

class ContactusController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = ContactUs::get();
         $logo = SiteSetting::first();
         $messageCount = Contactus::count('name');
        return view('admin.message.message')->with(compact('details','logo','messageCount'));
    }

    public function save(Request $request){
        $messages = [
            'name.required' => 'Please Enter Your Name.',
            'email.required' => 'Please Enter your email.',
            'message.required' => 'Please Enter Your Message'
        ];
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|max:1000',
        ], $messages);
        if ($validator->fails()) {
            return response()->json($validator->getMessageBag()->toArray(), 422);
        } else {
            // // !TODO store contact
            ContactUs::create($request->all());

            $formData = [
                'name' => $request->name,
                'email' => $request->email,
                'body_message' => $request->message
            ];

            Mail::send('email.submit_form', $formData, function ($message) use ($formData) {
                $message->to(env('MAIL_FROM_ADDRESS'))->from($formData['email']);
                $message->subject('Contact us');
            });

            return json_encode(array(
                "statusCode" => 200
            ));
        }
    }
   
    public function messageDetails($id=null){
        $userMessage = Contactus::latest()->take(4)->get();
        $messageDetail = Contactus::where(['id'=>$id])->first();
        $messageCount = Contactus::count('name');
        $logo = SiteSetting::first();
        return view('admin.message.details')->with(compact('messageDetail','userMessage','messageCount','logo'));
    }

    public function deleteMessage($id){
        Contactus::where(['id'=>$id])->delete();
        return redirect()->route('contact.index')->with('flash_message_success','Selected Message has been deleted successfylley!');
    }
}
