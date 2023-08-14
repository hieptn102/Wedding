<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;

class BannerController extends Controller
{
    public function BannerAll()
    {
        $banner = Banner::latest()->get();
        return view('backend.banner.banner_all', compact('banner'));
    } // End Mehtod

    public function BannerAdd()
    {
        return view('backend.banner.banner_add');
    }

    public function BannerStore(Request $request)
    {
        $image = $request->file('banner_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 343434.png
        Image::make($image)
            ->resize(1500, 1000)
            ->save('upload/banner/' . $name_gen);
        $save_url = 'upload/banner/' . $name_gen;
        Banner::insert([
            'name_male' => $request->name_male,
            'name_female' => $request->name_female,
            'banner_image' => $save_url,
        ]);
        $notification = [
            'message' => 'Thêm thông tin thành công',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('banner.all')
            ->with($notification);
    } // End Method

    public function BannerEdit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('backend.banner.banner_edit', compact('banner'));
    } // End Method

    public function BannerUpdate(Request $request)
    {
        $banner_id = $request->id;
        if ($request->file('banner_image')) {
            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 343434.png
            Image::make($image)
                ->resize(1500, 1000)
                ->save('upload/banner/' . $name_gen);
            $save_url = 'upload/banner/' . $name_gen;
            Banner::findOrFail($banner_id)->update([
                'name_male' => $request->name_male,
                'name_female' => $request->name_female,
                'banner_image' => $save_url,
            ]);
            $notification = [
                'message' => 'Cập nhật thông tin thành công',
                'alert-type' => 'success',
            ];
            return redirect()
                ->route('banner.all')
                ->with($notification);
        } else {
            Banner::findOrFail($banner_id)->update([
                'name_male' => $request->name_male,
                'name_female' => $request->name_female,
            ]);
            $notification = [
                'message' => 'Cập nhật thông tin thành công',
                'alert-type' => 'success',
            ];
            return redirect()
                ->route('banner.all')
                ->with($notification);
        } // end else
    } // End Method

    public function BannerDelete($id)
    {
        $banner = Banner::findOrFail($id);
        $img = $banner->banner_image;
        unlink($img);
        Banner::findOrFail($id)->delete();
        $notification = [
            'message' => 'Xóa banner thành công',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    } // End Method
}
