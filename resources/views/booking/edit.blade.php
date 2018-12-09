@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Share
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('booking.update', $bookings->id) }}">
                @method('PUT')
                @csrf
                <label for="name">Booking Detail:</label><br/>
                <input type="radio" name="detail" value="learn" {{ $bookings->detail == 'learn' ? 'checked' : ''}}> Learn<br>
                <input type="radio" name="detail" value="presentation" {{ $bookings->detail == 'presentation' ? 'checked' : ''}}> Presentation<br>
                <input type="radio" name="detail" value="conference" {{ $bookings->detail == 'conference' ? 'checked' : ''}}>Conference<br>
                <input type="radio" name="detail" value="other" {{ $bookings->detail == 'other' ? 'checked' : ''}}> Other
                <div class="form-group">
                    <label for="price">Date:</label>
                    <input type="date" name="date" value="{{ $bookings->date }}"/>
                </div>
                <div class="form-group">
                    <label for="price">Start Time and End Time: </label>
                    <select class="form-control" name="start_time" id="start_time">
                        <option value="8" {{ $bookings->start_time == '8' ? 'selected' : ''}}>08.00</option>
                        <option value="9" {{ $bookings->start_time == '9' ? 'selected' : ''}}>09.00</option>
                        <option value="10" {{ $bookings->start_time == '10' ? 'selected' : ''}}>10.00</option>
                        <option value="11" {{ $bookings->start_time == '11' ? 'selected' : ''}}>11.00</option>
                        <option value="12" {{ $bookings->start_time == '12' ? 'selected' : ''}}>12.00</option>
                        <option value="13" {{ $bookings->start_time == '13' ? 'selected' : ''}}>13.00</option>
                        <option value="14" {{ $bookings->start_time == '14' ? 'selected' : ''}}>14.00</option>
                        <option value="15" {{ $bookings->start_time == '15' ? 'selected' : ''}}>15.00</option>
                    </select>
                    <select class="form-control" name="e_time">
                        <option value="9" {{ $bookings->e_time == '9' ? 'selected' : ''}}>09.00</option>
                        <option value="10" {{ $bookings->e_time == '10' ? 'selected' : ''}}>10.00</option>
                        <option value="11" {{ $bookings->e_time == '11' ? 'selected' : ''}}>11.00</option>
                        <option value="12" {{ $bookings->e_time == '12' ? 'selected' : ''}}>12.00</option>
                        <option value="13" {{ $bookings->e_time == '13' ? 'selected' : ''}}>13.00</option>
                        <option value="14" {{ $bookings->e_time == '14' ? 'selected' : ''}}>14.00</option>
                        <option value="15" {{ $bookings->e_time == '15' ? 'selected' : ''}}>15.00</option>
                        <option value="16" {{ $bookings->e_time == '16' ? 'selected' : ''}}>16.00</option>
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
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection