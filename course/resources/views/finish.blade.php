@extends('layouts.app')

@section('title') Course @endsection

@section('content')
    <div class="content">
        <h1 class="text-center"> Finish </h1>
        @include('layouts.messages')
        <div class="col-md-8 offset-2">
            @if (isset($student->avatar))
                <img src=" {{ Storage::disk('upload')->url($student->avatar) }}" alt="upload failed" class="img-thumbnail">
            @endif
                <h2>Поздравляем {{ $student->email ?? '' }}</h2>
            <div>Твоя оценка <span>{{ $student->point ?? '' }}</span> балов</div>
            <div>Общее время прохождения теста <span>{{ $time ?? '' }}</span> секунд</div>
                <a href="{{ route('start') }}"> Перейти в начало </a>
        </div>


    </div>


@endsection







