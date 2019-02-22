@extends('layouts.app')

@section('title') Course @endsection

@section('content')
    <div class="content">
        <div class="title m-b-md">
            Start page
        </div>
        @include('layouts.error')
        <form action="{{ route('index.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>

    </div>

@endsection







