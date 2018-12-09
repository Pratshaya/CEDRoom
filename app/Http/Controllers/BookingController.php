<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Room;
use App\Status;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('booking.index');
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
            'start_time'=> 'required|date',
            'end_time' => 'required|date',
            'room_id'=> 'room_id',
            'class_id'=>'class_id'
        ]);
        $booking = new Booking([
            'detail' => $request->get('detail'),
            'date' => $request->get('date'),
            'start_time'=> $request->get('start_time'),
            'end_time'=> $request->get('end_time'),
            'room_id'=> $request->get('room_id'),
            'class_id'=> $request->get('class_id')
        ]);
        $booking->save();
        return redirect('/bookings')->with('success', 'Booking has been added');
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
    public function edit(Booking $booking)
    {
        $booking = Booking::find($booking);

        return view('booking.edit', compact('booking'));
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
            'share_name'=>'required',
            'share_price'=> 'required|integer',
            'share_qty' => 'required|integer'
        ]);

        $share = Share::find($id);
        $share->share_name = $request->get('share_name');
        $share->share_price = $request->get('share_price');
        $share->share_qty = $request->get('share_qty');
        $share->save();

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
        //
    }
}
