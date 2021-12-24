<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Category::get();
        return view('admin.category.view')->with(compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
                'name' => 'required|max:255',
            ]);
            $input = new Category();
            $input->name = $data['name'];
            $data['publish']=is_null($request->publish)? 0 : 1 ;
            $input->publish = $data['publish'];
            $input->save();
            return redirect()->back()->with('flash_message_success','New Destination is added successfully!');
        }
    }


    public function edit($id)
    {
        $detail = Category::findorfail($id);
        return view('admin.category.edit')->with(compact('detail'));
    }

   
    public function update(Request $request, $id)
    {
        if($request->isMethod('put')){
            $value = $request->except('publish');
            $value['publish']=is_null($request->publish)? 0 : 1 ;
            Category::find($id)->update($value);
            return redirect()->route('category.index')->with('flash_message_success','Selected Data is Updated!');
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
        Category::find($id)->delete();
        return redirect()->back()->with('flash_message_success','Selected Category is deleted successfully!');
    }
}
