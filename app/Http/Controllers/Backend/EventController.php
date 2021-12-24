<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EventImage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Image;
use function PHPUnit\Framework\returnSelf;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = EventImage::all();
        $logo = SiteSetting::first();
        return view('admin.services.list')->with(compact('details','logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logo = SiteSetting::first();
        return view('admin.services.add')->with(compact('logo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($request->isMethod('post')){
          $data = $request->all();
          $request->validate([
            'image' => 'required',
            'description' => 'required|max:255'
        ]);
          $input = new EventImage();
          $input->description = $request->description;
          $input->publish = is_null($request->publish) ? 0 : 1;
          $input->name = $request->name;
          //upload image
          if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/events/', $filename);
            $input->image = $filename;
        }else{
            return $request;
            $input->image ='';
        }
        $input->save();
        return redirect()->back()->with('flash_message_success','New Service is added Successfully!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = EventImage::findorfail($id);
        $logo = SiteSetting::first();
        return view('admin.services.edit')->with(compact('detail','logo'));
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
        $record = EventImage::findorfail($id);
        $formInput = $request->except(['publish']);
        $formInput['publish'] = is_null($request->publish) ? 0 : 1;
        if ($request->image) {
            if ($record->image) {
                $this->unlinkImage($record->image);
            }
            $image = $request->file('image');
            $imageName = time() . '.image.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/events'), $imageName);
            $formInput['image'] = $imageName;
        }
        $record->update($formInput);
        return redirect()->route('services.index')->with('flash_message_success', 'Setting updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = EventImage::findorfail($id);
        if ($event->image) {
            $this->unlinkImage($event->image);
        }
        $event->delete();
        return redirect()->back()->with('flash_message_success','Selected event is deleted successfully!');
    }
    public function imageProcessing($image)
    {

        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $mainPath = public_path('uploads/events');
        $img = Image::make($image->getRealPath());
        $img->save($mainPath . '/' . $input['imagename']);
        $img->destroy();
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {

        $mainPath = public_path('uploads/events/') . $imagename;
        unlink($mainPath);
        return;
    }
}
