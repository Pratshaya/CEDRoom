@extends('layouts.app')

@section('content')
    <div class="card uper">
        <div class="card-header">
            Add Booking
        </div>
        <div class="card-body">
            <form method="post" action="{{route('booking.store')}}">
                <div class="form-group">
                    @csrf
                    <input type="hidden" class="form-control" name="users_id"
                           value="{{\Illuminate\Support\Facades\Auth::id()}}"/>
                    <label for="name">Booking Detail:</label><br/>

                    <input type="radio" name="detail" value="learn"> Learn<br>

                    <input type="radio" name="detail" value="presentation"> Presentation<br>
                    <input type="radio" name="detail" value="conference">Conference<br>
                    <input type="radio" name="detail"  value="other"> Other
                </div>
                <div class="form-group">
                    <label for="price">Date:</label>
                    <input type="date" name="date"/>
                </div>
                <div class="form-group">
                    <label for="price">Start Time and End Time: </label>
                    <select class="form-control" name="start_time">
                        <option value="8">08.00</option>
                        <option value="9">09.00</option>
                        <option value="10">10.00</option>
                        <option value="11">11.00</option>
                        <option value="12">12.00</option>
                        <option value="13">13.00</option>
                        <option value="14">14.00</option>
                        <option value="15">15.00</option>
                    </select>
                    <select class="form-control" name="e_time">
                        <option value="9">09.00</option>
                        <option value="10">10.00</option>
                        <option value="11">11.00</option>
                        <option value="12">12.00</option>
                        <option value="13">13.00</option>
                        <option value="14">14.00</option>
                        <option value="15">15.00</option>
                        <option value="16">16.00</option>
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="name">Room:</label>
                    <select class="form-control" name="room_id">
                        @foreach($rooms as $room)
                            <option value="{{$room->id}}" id="{{$room->id}}">{{$room->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection