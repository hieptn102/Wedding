<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Image;


class EventController extends Controller
{
    public function EventAll()
    {
        $event = Event::latest()->get();
        return view('backend.event.event_all', compact('event'));
    } // End Mehtod

    public function EventEdit($id)
    {
        $event = Event::findOrFail($id);
        return view('backend.event.event_edit', compact('event'));
    } // End Method

    public function EventUpdate(Request $request)
    {
        $event_id = $request->id;
        if ($request->file('backgroud')) {
            $image = $request->file('backgroud');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension(); // 343434.png
            Image::make($image)
                ->resize(1500, 1000)
                ->save('upload/event/' . $name_gen);
            $save_url = 'upload/event/' . $name_gen;
            Event::findOrFail($event_id)->update([
                'main_start_time' => $request->main_start_time,
                'main_end_time' => $request->main_end_time,
                'main_day_date' => $request->main_day_date,
                'main_month_year' => $request->main_month_year,
                'main_des' => $request->main_des,
                'party_start_time' => $request->party_start_time,
                'party_end_time' => $request->party_end_time,
                'party_day_date' => $request->party_day_date,
                'party_month_year' => $request->party_month_year,
                'party_des' => $request->party_des,
                'backgroud' => $save_url,
            ]);
            $notification = [
                'message' => 'Cập nhật thông tin thành công',
                'alert-type' => 'success',
            ];
            return redirect()
                ->route('banner.all')
                ->with($notification);
        } else {
            Event::findOrFail($event_id)->update([
                'main_start_time' => $request->main_start_time,
                'main_end_time' => $request->main_end_time,
                'main_day_date' => $request->main_day_date,
                'main_month_year' => $request->main_month_year,
                'main_des' => $request->main_des,
                'party_start_time' => $request->party_start_time,
                'party_end_time' => $request->party_end_time,
                'party_day_date' => $request->party_day_date,
                'party_month_year' => $request->party_month_year,
                'party_des' => $request->party_des,
            ]);
            $notification = [
                'message' => 'Cập nhật thông tin thành công',
                'alert-type' => 'success',
            ];
            return redirect()
                ->route('event.all')
                ->with($notification);
        } // end else
    } // End Method
}
