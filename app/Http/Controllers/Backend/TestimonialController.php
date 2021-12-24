<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
   /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $logo = SiteSetting::first();
        $details = Testimonial::get();
        return view('admin.testimonial.view')->with(compact('details','logo'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $logo = SiteSetting::first();
        return view('admin.testimonial.create')->with(compact('logo'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $value = $request->except('image','publish','name','description','job');
        $value['publish'] = is_null($request->publish)? 0 : 1 ;
        $value['name'] = $request->name;
        $value['job'] = $request->job;
        $value['description'] = $request->description;
        //upload image
        if ($request->hasFile('image')) {
            $thumImg = $this->imageProcessing($request->file('image'));
            $value['image'] = $thumImg;
        }
        Testimonial::create($value);
        return redirect()->back()->with('flash_message_success', 'Data Added Successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $logo = SiteSetting::first();
        $detail = Testimonial::findorfail($id);
        return view('admin.testimonial.edit')->with(compact('detail','logo'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $value = $request->except('image','publish','name','description','job');
        $value['publish'] = is_null($request->publish)? 0 : 1 ;
        $value['name'] = $request->name;
        $value['job'] = $request->job;
        $value['description'] = $request->description;
        $image = Testimonial::find($id);
        if ($request->hasFile('image')) {
            if ($image->client_image) {
                $this->unlinkImage($image->client_image);
            }
            $value['image'] = $this->imageProcessing($request->file('image'));
        }
        Testimonial::find($id)->update($value);
        return redirect()->back()->with('flash_message_success', 'Testimonials Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $image=Testimonial::find($id);
        if($image->banner_image){
            $imagePath = public_path('uploads/testimonials');
            if((file_exists($imagePath.'/'.$image->banner_image))){
                unlink($imagePath.'/'.$image->banner_image);
            }
        }
        if($image->testimonial_image){
            $imagePath = public_path('uploads/testimonials');
            if((file_exists($imagePath.'/'.$image->testimonial_image))){
                unlink($imagePath.'/'.$image->testimonial_image);
            }
        }
        Testimonial::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Selected Testimonial Image is Deleted Successfully.');
    }
    public function imageProcessing($image)
    {
        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->extension();
        $image->move('uploads/testimonials/', $input['imagename']);
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $mainPath = public_path('uploads/testimonials/') . $imagename;
        unlink($mainPath);
        return;
    }
}
