<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Associate;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Image;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logo = SiteSetting::first();
        $detail = SiteSetting::first();
        return view('admin.sitesetting.sitesetting')->with(compact('detail','logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    
    public function update(Request $request, $id)
    {
         $request->validate([
            'email' => 'required|email|max:255',
            'facebook' => 'required|url|max:255',
            'phone' => 'required|max:255',
            'location' => 'required|max:255',
            'messanger' => 'url|max:255',
            'instagram' => 'url|max:255',
            'youtube' => 'url|max:255',
        ]);
        $record = SiteSetting::findOrFail($id);
        $formInput = $request->except(['logo', 'fav-icon']);
        if ($request->hasFile('logo')) {
            if ($record->logo) {
                $this->unlinkImage($record->logo);
            }
            $logo = $request->file('logo');
            $imageName = time() . '.logo.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/main'), $imageName);
            $formInput['logo'] = $imageName;
        }

        if ($request->hasFile('fav_icon')) {
            if ($record->fav_icon) {
                $this->unlinkImage($record->fav_icon);
            }
            $fav_icon = $request->file('fav_icon');
            $imageName = time() . '.fav_icon.' . $fav_icon->getClientOriginalExtension();
            $fav_icon->move(public_path('images/main'), $imageName);
            $formInput['fav_icon'] = $imageName;
        }
        $record->update($formInput);
        return redirect()->back()->with('flash_message_success', 'Setting updated Successfully');
    }
    public function imageProcessing($image, $width, $height, $otherpath)
    {

        $input['imagename'] = Date("D-h-i-s") . '-' . rand() . '-' . '.' . $image->getClientOriginalExtension();
        $thumbPath = public_path('images/thumbnail');
        $mainPath = public_path('images/main');
        $listingPath = public_path('images/listing');

        $img = Image::make($image->getRealPath());
        $img->fit($width, $height)->save($mainPath . '/' . $input['imagename']);

        // with no fit
        // $img->save($mainPath . '/' . $input['imagename']);

        if ($otherpath == 'yes') {
            $img->fit($width / 2, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($listingPath . '/' . $input['imagename']);

            $img->fit(200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath . '/' . $input['imagename']);
        }

        $img->destroy();
        return $input['imagename'];
    }

    public function unlinkImage($imagename)
    {
        $thumbPath = public_path('images/thumbnail/') . $imagename;
        $mainPath = public_path('images/main/') . $imagename;
        $listingPath = public_path('images/listing/') . $imagename;
        if (file_exists($thumbPath)) {
            unlink($thumbPath);
        }

        if (file_exists($mainPath)) {
            unlink($mainPath);
        }

        if (file_exists($listingPath)) {
            unlink($listingPath);
        }

        return;
    }

}
