@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    Edit Question Option
                </div>
                <div class="col-md-6">
                    <a href="{{ route('question.OptionIndex',['question'=> $options->question_id]) }}" class="btn btn-outline-primary create_btn">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('question.OptionUpdate',['option'=>$options->id]) }}" method="POST">
                @csrf

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="Question">Question Option</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" id="option" name="option">{{ $options->option }}</textarea>
                        </div>
                    </div>
                </div>
                <form-group>
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                        </div>
                    </div>
                </form-group>
            </form>
        </div>
    </div>
</div>





@endsection
