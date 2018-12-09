@extends('layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Share
        </div>
        <div class="card-body">
           <form method="post" action="{{ route('room.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">New Room Name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
@endsection