@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Detail</td>
                <td>Date</td>
                <td>Start Time</td>
                <td>End Time</td>
                <td>Room</td>
                <td>Classname</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{$booking->id}}</td>
                    <td>{{$booking->detail}}</td>
                    <td>{{$booking->date}}</td>
                    <td>{{$booking->start_time}}</td>
                    <td>{{$booking->e_time}}</td>
                    <td>{{$booking->room_id}}</td>
                    <td>{{$booking->class_id}}</td>
                    <td><a href="{{ route('bookings.edit',$booking->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('shares.destroy', $booking->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection