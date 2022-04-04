@extends('layouts.app')

@section('content')

<div id="exTab1" class="container">
    <ul  class="nav nav-pills nav-fill">
		<li class="nav-item active"><a  class="nav-link active" href="#1a" data-toggle="tab">Personal Details</a></li>
		<li class="nav-item"><a class="nav-link" href="#2a" data-toggle="tab">Questionnaire</a></li>
	</ul>
</div>

<div class="tab-content clearfix">
    <div class="tab-pane active" id="1a">
        <div class="container" style="margin-top: 8px">
            <form action="{{ route('profile.update',['profile'=>$user_data->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control-plaintext" name="name" id="name" value="{{ $user_data->name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" value="{{ $user_data->email }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
                    <div class="col-sm-10">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value=0 @if ($user_data->gender == 0) checked @else '' @endif>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value=1  @if ($user_data->gender == 1) checked @else '' @endif>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="location" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-10">
                        <textarea name="location" id="location" cols="50" rows="5">{{ $user_data->location }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </form>
        </div>
    </div>
    <div class="tab-pane" id="2a">
        <div class="container" style="margin-top: 8px">
            <form action="{{ route('profile.menteeAnswers') }}" method="POST">
                @csrf
                <div class="form-group row">
                    @foreach ($mentees as $mentee)
                        @if(Auth::user()->type == 1)
                            <label for="question" class="col-sm-2 col-form-label">{{ $mentee->question }}</label>
                        @else
                            <label for="question" class="col-sm-2 col-form-label">{{ $mentee->skill }}</label>
                        @endif
                        <div class="col-sm-10">
                            @foreach ($options as $opt)
                                @if($opt->question_id == $mentee->id)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="{{ $mentee->id }}" id="option" value="{{ $opt->id }}" required @if($opt->id == $mentee->value) checked @else '' @endif>
                                    <label class="form-check-label" for="female">{{ $opt->option }}</label>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection
