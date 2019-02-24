@extends('layouts.app')

@section('title') Course @endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center">Start page</h1>

                @include('layouts.messages')
                <form action="{{ route('start.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('name') ?? '' }}">
                    </div>

                    <div class="form-group image_upload">
                        <input id="image_upload" name="avatar" type="file"
                               accept=".jpg, .jpeg., .png, .gif, .bmp, .svg">
                    </div>
                    <button type="submit" class="btn btn-primary" onClick="startClock()">Next</button>
                </form>

            </div>
        </div>
    </div>


@endsection







