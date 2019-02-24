@extends('layouts.app')

@section('title') Course @endsection

@section('content')
    <div class="content">
        <h1 class="text-center"> Finish </h1>
        @include('layouts.messages')
        <div>
            @if ($student->avatar)
                <img src=" {{ Storage::disk('upload')->url($student->avatar) }}" alt="upload failed" class="img-thumbnail">
            @endif
        </div>


    </div>


@endsection







