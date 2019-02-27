@extends('layouts.app')

@section('title') Course @endsection

@section('content')
    <div class="content">
        <h1 class="text-center">Step-4</h1>
        @include('layouts.messages')
        <form action="{{ route('step-4.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <h2>Какой сегодня день недели?</h2>
                <div class="col-md-8 text-left offset-5">
                    @foreach($weeks as $key => $week)
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultUnchecked-{{ $key }}"
                                   name="day" value="{{ $key }}">
                            <label class="custom-control-label" for="defaultUnchecked-{{ $key }}">{{ $week }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Next</button>
        </form>

    </div>

@endsection







