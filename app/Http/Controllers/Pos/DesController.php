<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Des;
use Image;

class DesController extends Controller
{
    public function DesAll()
    {
        $des = Des::latest()->get();
        return view('backend.description.des_all', compact('des'));
    } // End Mehtod

    public function DesAdd()
    {
        return view('backend.description.des_add');
    }

    public function DesStore(Request $request)
    {
        $male_image = $request->file('male_image');
        $name_gen = hexdec(uniqid()) . '.' . $male_image->getClientOriginalExtension(); // 343434.png
        Image::make($male_image)
            ->resize(400, 400)
            ->save('upload/des/' . $name_gen);
        $save_url = 'upload/des/' . $name_gen;
        $female_image = $request->file('female_image');
        $name_gen1 = hexdec(uniqid()) . '.' . $female_image->getClientOriginalExtension(); // 343434.png
        Image::make($male_image)
            ->resize(400, 400)
            ->save('upload/des/' . $name_gen1);
        $save_url1 = 'upload/des/' . $name_gen1;
        Des::insert([
            'time' => $request->time,
            'name_male' => $request->name_male,
            'male_des' => $request->male_des,
            'male_image' => $save_url,
            'name_female' => $request->name_male,
            'female_des' => $request->female_des,
            'female_image' => $save_url1,
        ]);
        $notification = [
            'message' => 'Thêm thông tin thành công',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('des.all')
            ->with($notification);
    } // End Method

    public function DesEdit($id)
    {
        $des = Des::findOrFail($id);
        return view('backend.banner.banner_edit', compact('des'));
    } // End Method

    // public function DesUpdate(Request $request)
    // {
    //     $des_id = $request->id;
    //     if ($request->file('banner_image')) {
    //         $image = $request->file('banner_image');
    //         $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 343434.png
    //         Image::make($image)
    //             ->resize(1500, 1000)
    //             ->save('upload/des/' . $name_gen);
    //         $save_url = 'upload/des/' . $name_gen;
    //         Des::findOrFail($des_id)->update([
    //             'name_male' => $request->name_male,
    //             'name_female' => $request->name_female,
    //             'banner_image' => $save_url,
    //         ]);
    //         $notification = [
    //             'message' => 'Cập nhật thông tin thành công',
    //             'alert-type' => 'success',
    //         ];
    //         return redirect()
    //             ->route('banner.all')
    //             ->with($notification);
    //     } else {
    //         Banner::findOrFail($banner_id)->update([
    //             'name_male' => $request->name_male,
    //             'name_female' => $request->name_female,
    //         ]);
    //         $notification = [
    //             'message' => 'Cập nhật thông tin thành công',
    //             'alert-type' => 'success',
    //         ];
    //         return redirect()
    //             ->route('banner.all')
    //             ->with($notification);
    //     } // end else
    // } // End Method

    public function DesDelete($id)
    {
        $des = Des::findOrFail($id);
        $img = $des->male_image;
        unlink($img);
        $img1 = $des->female_image;
        unlink($img1);
        Des::findOrFail($id)->delete();
        $notification = [
            'message' => 'Xóa mô tả thành công',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
