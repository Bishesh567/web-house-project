<?php

namespace App\Http\Controllers;

use App\Models\Associate;
use App\Models\EventImage;
use App\Models\OrderDetail;
use App\Models\RegisteredUser;
use App\Models\SiteSetting;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(Auth::attempt(['email'=>$data['username'],'password'=>$data['password']])){
                return redirect('/dashboard');
            }else{
                return redirect('/login')->with('flash_message_success','Invalide Username or Password!');
            }
        }
        return view('admin.login');
    }
    public function dashboard(){
        $detail = Associate::count();
        $serviceDetails = EventImage::count();
        $logo = SiteSetting::first();
        return view('admin.dashboard')->with(compact('detail','serviceDetails','logo'));
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
}
