<?php

namespace App\Http\Controllers;

use App\Notifications\SendEmailNotification;
use Notification;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index()
    {

        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {

                $data = Room::all();

                $gallery = Gallery::all();

                return view("home.index", compact('data', 'gallery'));
            } else if ($usertype == 'admin') {
                return view("admin.index");
            } else {
                return redirect()->back();
            }
        }
    }
    public function home()
    {
        $data = Room::all();

        $gallery = Gallery::all();

        return view("home.index", compact('data', 'gallery'));
    }
    public function createRoom()
    {
        return view("admin.createRoom");
    }
    public function addRoom(Request $request)
    {
        //Create a new room and save it in the database
        $data = new Room;
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->wifi = $request->wifi;
        $data->price = $request->price;
        $data->room_type = $request->type;

        $image = $request->img;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->img->move('roomImg', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        toastr()->positionClass('toast-top-center')->timeOut(10000)->addSuccess('Room Added Successfully !');
        return redirect()->back();
    }
    public function viewRoom()
    {
        $data = Room::all();
        return view('admin.viewRoom', compact('data'));
    }
    public function deleteRoom($id)
    {
        $data = Room::find($id);

        // if ($data->image) {
        //     $path = "roomImg" . $data->image;
        //     if (File::exists($path)) {
        //         File::delete($path);
        //     };
        // }
        $data->delete();

        toastr()->positionClass('toast-top-center')->timeOut(10000)->addWarning('Room Deleted Successfully !');
        return redirect()->back();
    }
    public function editRoom($id)
    {
        $data = Room::find($id);

        return view('admin.updateRoom', compact('data'));
    }

    public function updateRoom(Request  $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->wifi = $request->wifi;
        $data->price = $request->price;
        $data->room_type = $request->type;

        $image = $request->img;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->img->move('roomImg', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        toastr()->positionClass('toast-top-center')->timeOut(10000)->addSuccess('Room Updated Successfully!');
        return redirect()->back();
    }

    public function bookings()
    {
        $data =  Booking::all();
        return view('admin.bookings', compact('data'));
    }
    public function deleteBooking($id)
    {
        $data = Booking::find($id);

        $data->delete();

        toastr()->positionClass('toast-top-center')->timeOut(5000)->addWarning('Booking Deleted Successfully !');
        return redirect()->back();
    }
    public function approveBooking($id)
    {
        $booking = Booking::find($id);

        $booking->status = 'Approved';

        $booking->save();

        toastr()->positionClass('toast-top-center')->timeOut(5000)->addSuccess('Booking Approved Successfully!');
        return redirect()->back();
    }
    public function rejectBooking($id)
    {
        $booking = Booking::find($id);

        $booking->status = 'Rejected';

        $booking->save();

        toastr()->positionClass('toast-top-center')->timeOut(5000)->addWarning('Booking Rejected Successfully!');
        return redirect()->back();
    }
    public function viewGallery()
    {
        $gallery = Gallery::all();
        return view('admin.gallery', compact('gallery'));
    }
    public function uploadImg(Request $request)
    {

        $data = new Gallery;

        $image = $request->img;
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->img->move('galleryImg', $imageName);
            $data->image = $imageName;
        }

        $data->save();

        toastr()->positionClass('toast-top-center')->timeOut(10000)->addSuccess('Image Upload Successfully!');
        return redirect()->back();
    }
    public function deleteImg($id)
    {
        $gallery = Gallery::find($id);

        // if ($data->image) {
        //     $path = "roomImg" . $data->image;
        //     if (File::exists($path)) {
        //         File::delete($path);
        //     };
        // }

        $gallery->delete();

        toastr()->positionClass('toast-top-center')->timeOut(10000)->addError('Image Deleted Successfully!');
        return redirect()->back()->with('status', "Category Deleted Succesfully");
    }

    public function viewMessages()
    {
        $data = Contact::all();
        return view('admin.messages', compact('data'));
    }
    public function deleteMsg($id)
    {
        $data = Contact::find($id);

        $data->delete();

        toastr()->positionClass('toast-top-center')->timeOut(10000)->addError('Message Deleted Successfully !');
        return redirect()->back();
    }
    public function sendMail($id)
    {
        $data = Contact::find($id);

        return view('admin.sendmail', compact('data'));
    }
    public function Mail(Request  $request, $id)
    {
        $data = Contact::find($id);

        $details = [
            'greeting' => $request->greeting,

            'body' => $request->body,

            'action_text' => $request->action_text,

            'action_url' => $request->action_url,

            'endline' => $request->endline,
        ];

        Notification::send($data, new SendEmailNotification($details));


        toastr()->positionClass('toast-top-center')->timeOut(10000)->addSuccess('Emai Send Successfully !');

        return redirect()->back();
    }
}
