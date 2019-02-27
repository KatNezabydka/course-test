@extends('layouts.app')

@section('title') Course @endsection

@section('content')
    <div class="content">
        <h1 class="text-center">Step-1</h1>
        @include('layouts.messages')
        <form class="text-center" action="{{ route('step-1.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-group center text-center">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eu ullamcorper augue. Aenean efficitur
                    lacinia velit non luctus. Donec rutrum tristique odio, in accumsan tellus tincidunt vel. Suspendisse
                    elementum at massa at aliquam. Maecenas et ante metus. Vestibulum eget libero enim. Donec eu neque
                    sit amet nunc fringilla suscipit. Integer in accumsan lectus. Maecenas gravida imperdiet tortor et
                    fringilla. Mauris eget quam eu sapien tincidunt vestibulum at sit amet erat. Sed eu mollis tellus.
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Next</button>
        </form>

    </div>

@endsection







