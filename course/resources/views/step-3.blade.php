@extends('layouts.app')

@section('title') Course @endsection

@section('content')
    <div class="content">
        <h1 class="text-center">Step-3</h1>
        @include('layouts.messages')
        <form class="text-center" action="{{ route('step-3.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="form-group center text-center">
                    <h2>Какие языки программирования ты знаешь?</h2>
                    <div class="bg ">
                        <div>
                            <div class="chiller_cb">
                                <input id="myCheckbox" type="checkbox" name="php">
                                <label for="myCheckbox">PHP</label>
                                <span></span>
                            </div>
                            <div class="chiller_cb">
                                <input id="myCheckbox2" type="checkbox" name="python">
                                <label for="myCheckbox2">Python</label>
                                <span></span>
                            </div>
                            <div class="chiller_cb">
                                <input id="myCheckbox3" type="checkbox" name="js">
                                <label for="myCheckbox3">JS</label>
                                <span></span>
                            </div>
                            <div class="chiller_cb">
                                <input id="myCheckbox4" type="checkbox" name="net">
                                <label for="myCheckbox4">.net</label>
                                <span></span>
                            </div>
                            <div class="chiller_cb">
                                <input id="myCheckbox5" type="checkbox" name="basic">
                                <label for="myCheckbox5">Visual Basic</label>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Next</button>
        </form>

    </div>

@endsection







