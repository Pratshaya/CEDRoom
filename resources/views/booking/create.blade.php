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
                    <label for="name">Booking Detail:</label>
                    <input type="text" class="form-control" name="detail"/>
                </div>
                <div class="form-group">
                    <label for="price">Date:</label>
                    <input type="date" class="form-control" name="date"/>
                </div>
                <div class="form-group">
                    <label for="price">Start Time and End Time ((format ex. 12.00 AM)) : </label>
                    <input type="time" class="form-control" name="start_time"/>
                    <input type="time" class="form-control" name="e_time"/>
                </div>

                <div class="form-group">
                    @csrf
                    <label for="name">Room:</label>
                    <select class="form-control">
                        @foreach($rooms as $room)
                            <option value="{{$room->name}}" id="{{$room->id}}">{{$room->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    @csrf
                    <label for="name">Class Name:</label>
                    <select class="form-control">
                        <option value="CED1-RA" id="1">CED1-RA</option>
                        <option value="CED2-RA" id="2">CED2-RA</option>
                        <option value="CED3-RA" id="3">CED3-RA</option>
                        <option value="CED4-RA" id="4">CED4-RA</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection