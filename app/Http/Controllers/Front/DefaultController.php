<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\AdboutUs;
use App\Models\Associate;
use App\Models\Banner;
use App\Models\EventImage;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\Film;
use App\Models\Work;
use Illuminate\Http\Request;
use Validator, File, Image;
use Mail;
use App\mail\flimMail;

use DB;

class DefaultController extends Controller
{
    public function index(){
        $bannerDetail = Banner::first();
        $aboutusDetail = AdboutUs::first();
        $firstflimDetail = Associate::where('video_type','normal')->get();
        $firstadsDetail = Associate::where('video_type','ads')->get();

        $details = SiteSetting::first();
        $services = EventImage::where('publish','1')->get();
        $testimonial = Testimonial::where('publish','1')->get();
        return view('moonstone.index')->with(compact('bannerDetail','firstadsDetail','aboutusDetail',
        'firstflimDetail','details','services','testimonial'));
    }

     public function filmwithus(){
         $bannerDetail = Banner::first();
        $aboutusDetail = AdboutUs::first();
        $firstflimDetail = Associate::where('publish','1')->get();

        $details = SiteSetting::first();
        $services = EventImage::where('publish','1')->get();
        $testimonial = Testimonial::where('publish','1')->get();
        return view('moonstone.filmwithus')->with(compact('bannerDetail','aboutusDetail',
        'firstflimDetail','details','services','testimonial'));
    }

    public function filmwithusform(Request $request){
        $validator = Validator::make($request->all(), [
            'film_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'film_email' => 'required',
            'film_desc' => 'required',
            'film_contact_num' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7',
            'film_test'=>'required',
            'film_docs' => 'required|array',
            'film_docs.*' => 'required|mimes:doc,pdf'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
          }
        if($request->hasfile('film_docs'))
        {

           foreach($request->file('film_docs') as $key=>$image)
           {
               $name = "Document-" . date('Ymdhis') . rand(0, 1234) . "." . $image->getClientOriginalExtension();

               $original_path = public_path() . "/uploads/film";
               if (!File::exists($original_path)) {
                   File::makeDirectory($original_path, 0777, true, true);
               }
               $image->move(public_path().'/uploads/film', $name);
               $data1[] = $name;
           }
           $film= new Film();
           $film->film_name = $request->film_name;
           $film->film_email = $request->film_email;
           $film->film_test = $request->film_test;
           $film->film_contact_num = $request->film_contact_num;
           $film->film_desc = $request->film_desc;
           $film->film_docs=json_encode($data1);
           $film->save();
           $links = $film->film_docs;

        $data=array(
            'name'=>$request->film_name,
            'email'=>$request->film_email,
            'film_test'=> $request->film_test,
            'phone'=>$request->film_contact_num,
            'subject'=>$request->film_desc,
            'links'=>$links
        );
        }
        //mail::to($req->Email)->send(new Usermail(['name'=>$req->Name]));
        //mail::to('rana.bishesh.5@gmail.com')->send(new flimMail($data));

        Mail::send('email.film', $data,function ($message) use ($data) {

            $message->to('prabal@webhousenepal.com')->from($data['email']);
            $message->subject('Film With Us');
           });
    if($film)
        return redirect()->back()->with(['message'=>'Thank You !.You have submitted successfully.We will get back to you soon.', 'type'=>'success']);
    else
        return redirect()->back()->with(['messageError'=>'Something Went Wrong!!!', 'type'=>'danger']);
    }


    public function workwithusform(Request $request){
        $validator = Validator::make($request->all(), [
            'work_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'work_email' => 'required',
            'work_desc' => 'required',
            'work_contact_num' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:7',
            'work_docs' => 'required',
            'work_docs.*' => 'required|mimes:doc,pdf'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
          }
        if($request->hasfile('work_docs'))
        {

           foreach($request->file('work_docs') as $key=>$image)
           {
            $name = "Document-" . date('Ymdhis') . rand(0, 1234) . "." . $image->getClientOriginalExtension();
               $original_path = public_path() . "/uploads/work";
               if (!File::exists($original_path)) {
                   File::makeDirectory($original_path, 0777, true, true);
               }
               $image->move(public_path().'/uploads/work', $name);
               $data1[] = $name;
           }
           $work= new work();
           $work->work_name = $request->work_name;
           $work->work_email = $request->work_email;
           $work->work_contact_num = $request->work_contact_num;
           $work->work_desc = $request->work_desc;
            $work->work_docs=json_encode($data1);
        $work->save();
        $links = $work->work_docs;
        $data=array(
            'name'=>$request->work_name,
            'email'=>$request->work_email,
            'phone'=>$request->work_contact_num,
            'subject'=>$request->work_desc,
            'links'=>$links
        );
        }
        Mail::send('email.work', $data,function ($message) use ($data) {

            $message->to('prabal@webhousenepal.com')->from($data['email']);
            $message->subject('Work With Us');
           });
        if($work)
        return redirect()->back()->with(['message'=>'Thank You !.You have submitted successfully.We will get back to you soon.', 'type'=>'success']);
    else
        return redirect()->back()->with(['messageError'=>'Something Went Wrong!!!', 'type'=>'danger']);
    }

}
