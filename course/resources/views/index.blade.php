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
                        <input type="email" name="email" class="form-control"
                               aria-describedby="emailHelp" placeholder="Enter email" value="{{ old('name') ?? '' }}">
                    </div>

                    <div class="form-group image_upload">
                        <input id="image_upload" name="avatar" type="file"
                               accept=".jpg, .jpeg., .png, .gif, .bmp, .svg">
                    </div>
                    <button type="submit" class="btn btn-primary" onClick="startClock()">Next</button>
                </form>
                <br>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Баллы</th>
                        <th scope="col">Время, с</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($students as $key => $student)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $student->email ?? '' }}</td>
                            <td>{{ $student->point ?? '' }}</td>
                            <td>@if (isset($student->created_at) && isset($student->updated_at))
                                    {{ $student->updated_at->diffInSeconds($student->created_at) }}
                                @endif</td>
                            {{--<td>@mdo</td>--}}
                        </tr>
                    @empty
                        <tr>
                            <td>Данные отсутствуют</td>
                        </tr>
                @endforelse

            </div>
        </div>
    </div>


@endsection







