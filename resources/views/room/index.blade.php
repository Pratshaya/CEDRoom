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
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Room Name</td>
            </tr>
            </thead>
            <tbody>
            @foreach($rooms as $room)
                <tr>
                    <td>{{$room->id}}</td>
                    <td>{{$room->name}}</td>
                    <td><a href="{{ route('room.edit',$room->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('room.destroy', $room->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <a href="{{ route('room.create') }}" class="btn btn-primary">Create Room</a>
        <div>
@endsection