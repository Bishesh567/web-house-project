<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Associate;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AssociatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = SiteSetting::first();
        $detail = Associate::orderBy('created_at','desc')->get();
        return view('admin.flims.view')->with(compact('detail','logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logo = SiteSetting::first();
        return view('admin.flims.add')->with(compact('logo'));
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
                'link' => 'url'
            ]);
            $input = new Associate();
            $input->link = $data['link'];
            $input->title = $data['title'];
            $input->category = $data['category'];
            $input->description = $data['description'];
            $input->video_type = $data['video'];
            $data['publish']=is_null($request->publish)? 0 : 1 ;
            $input->publish = $data['publish'];
            $input->save();
            return redirect()->back()->with('flash_message_success','Your Data is Added successfully!');
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
        $logo = SiteSetting::first();
        $details = Associate::where(['id'=>$id])->first();
        return view('admin.flims.edit')->with(compact('details','logo'));
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
            $data = $request->all();
            $request->validate([
                'link' => 'url',
            ]);
              $data['publish']=is_null($request->publish)? 0 : 1 ;
               Associate::where('id',$id)->update(['link'=>$data['name'],'title'=>$data['title'],'category'=>$data['category'],
               'description'=>$data['description'],'publish'=>$data['publish'],'video_type'=>$data['video']]);
              return redirect()->route('flims.index')->with('flash_message_success','Your Data has been updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Associate::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_success','Selected data has been deleted successfylley!');
    }
}
