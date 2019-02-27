@extends('layouts.app')

@section('title') Course @endsection

@section('content')
    <div class="content">
        <h1 class="text-center">Step-2</h1>
        @include('layouts.messages')
        <form class="text-center" action="{{ route('step-2.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-group center text-center">
                    <div>{{ $val_1 }} + {{ $val_2 }}</div>
                    <input type="text" name="result" class="col-md-1">
                    <input type="hidden" name="val_1" value="{{ $val_1 }}">
                    <input type="hidden" name="val_2" value="{{ $val_2 }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Next</button>
        </form>

    </div>

@endsection







