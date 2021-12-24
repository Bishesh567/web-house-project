<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Image;
use Validator;
class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = SiteSetting::first();
        $details = Banner::first();
        return view('admin.banner.edit')->with(compact('details','logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('put')){

            $request->validate([
                'link' => 'required|max:255',
            ]);
            $value=$request->except('image','publish','heading','description','link');
            $value['publish']=is_null($request->publish)? 0 : 1 ;
            $value['heading'] = $request->heading;
            $value['description'] = $request->description;
            $value['link'] = $request->link;
            //upload image
            if($request->hasFile('image')){
                $image=Banner::find($id);
                if($image->image){
                    $imagePath = public_path('uploads/banners');
                    if((file_exists($imagePath.'/'.$image->image))){
                        unlink($imagePath.'/'.$image->image);
                    }
                }
                $image=$this->imageProcessing($request->file('image'));
                $value['image']=$image;
            }
            Banner::find($id)->update($value);
            return redirect('/admin/banner')->with('flash_message_success','Banner has been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function imageProcessing($image)
    {
        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->extension();
        $image->move('uploads/banners/', $input['imagename']);
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $mainPath = public_path('uploads/banners') . $imagename;
        unlink($mainPath);
        return;
    }
   
}
