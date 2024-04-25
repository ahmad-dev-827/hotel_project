<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function detailRoom($id)
    {
        $room = Room::find($id);
        return view("home.detailRoom", compact("room"));
    }
    public function addBooking(Request $request, $id)
    {
        //validate the request
        $this->validate($request, [
            "startDate" => "required|date",

            "endDate" => "date|after:startDate",
        ]);

        $data = new Booking;

        $data->room_id = $request->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $isBooked = Booking::where('room_id', $id)
            ->where('start_date', '<=', $endDate)
            ->where('end_date', '>=', $startDate)->exists();

        if ($isBooked) {

            toastr()->timeOut(5000)->addWarning('Room is already Booked try another Date!');
            return redirect()->back();
        } else {

            $data->start_date = $request->startDate;
            $data->end_date = $request->endDate;
            $data->save();

            toastr()->timeOut(5000)->addSuccess('Booking Send Successfully!');

            return redirect()->back();
        };
    }

    public function contact(Request $request)
    {

        $data = new Contact;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->message = $request->message;
        $data->save();

        toastr()->positionClass('toast-top-center')->timeOut(5000)->addSuccess('Message Send Successfully!');
        return redirect()->back();
    }
    public function about()
    {
        return view("home.about1");
    }
    public function rooms()
    {
        $data = Room::all();

        return view("home.room1", compact("data"));
    }
    public function gallery()
    {
        $gallery = Gallery::all();
        return view("home.gallery1", compact("gallery"));
    }
    public function blog()
    {
        return view("home.blog1");
    }
    public function contact1()
    {
        $rooms = Room::all();
        return view("home.contact1", compact("rooms"));
    }
}
