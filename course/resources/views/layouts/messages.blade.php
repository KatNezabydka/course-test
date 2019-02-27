@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <li class="text-center">{{ $error }}</li>
        @endforeach
    </ul>
@endif
@if (\Session::has('error'))
    <div class="alert alert-danger text-center">{{\Session::get('error')}}</div>
@endif
@if (\Session::has('success'))
    <div class="alert alert-success text-center">{{ \Session::get('success') }}</div>
@endif