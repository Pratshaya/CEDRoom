<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return View('booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$booking = new Booking();
        $rooms = Room::where('status_id','=', 2)->get();
        return View('booking.create',compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'detail'=>'required',
            'date'=>'required',
            'start_time'=> 'required',
            'e_time' => 'required',
            'room_id'=> 'required',
            'users_id'=> 'required',

        ]);
        $booking = new Booking([
            'detail' => $request->get('detail'),
            'date' => $request->get('date'),
            'start_time'=> $request->get('start_time'),
            'e_time'=> $request->get('e_time'),
            'room_id'=> $request->get('room_id'),
            'users_id'=> Auth::id(),
        ]);
       // $request->only(['user_id'=>Auth::id()]);
        Booking::create($request->all());
        return redirect('/booking')->with('success', 'Booking has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking, Room $rooms)
    {
        $bookings = Booking::find($booking->id);
        $rooms = Room::where('status_id','=', 2)->get();
        return View('booking.edit', compact('bookings'), compact('rooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'detail'=>'required',
            'date'=>'required',
            'start_time'=>'required',
            'e_time'=>'required',
            'room_id'=>'required',
        ]);

        $bookings = Booking::find($booking->id);
        $bookings->detail = $request->get('detail');
        $bookings->date = $request->get('date');
        $bookings->start_time = $request->get('start_time');
        $bookings->e_time = $request->get('e_time');
        $bookings->room_id = $request->get('room_id');
        $bookings->save();

        return redirect('/booking')->with('success', 'Booking has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $booking = Booking::find($booking->id);
        $booking->delete();

        return redirect('/booking')->with('success', 'Booking has been deleted Successfully');
    }
}
