<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdboutUs;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $logo = SiteSetting::first();
        $details = AdboutUs::first();
        return view('admin.aboutus.edit')->with(compact('details','logo'));
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
                'description' => 'required',
            ]);
            $value=$request->except('image','publish','description','years_of_experence');
            $value['publish']=is_null($request->publish)? 0 : 1 ;
            $value['description'] = $request->description;
            $value['years_of_experence'] = $request->years_of_experence;
            //upload image
            if($request->hasFile('image')){
                $image=AdboutUs::find($id);
                if($image->image){
                    $imagePath = public_path('uploads/aboutus');
                    if((file_exists($imagePath.'/'.$image->image))){
                        unlink($imagePath.'/'.$image->image);
                    }
                }
                $image=$this->imageProcessing($request->file('image'));
                $value['image']=$image;
            }
            AdboutUs::find($id)->update($value);
            return redirect('/admin/aboutus')->with('flash_message_success','Aboutus has been updated');
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
        $image->move('uploads/aboutus/', $input['imagename']);
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $mainPath = public_path('uploads/aboutus') . $imagename;
        unlink($mainPath);
        return;
    }
   
}
