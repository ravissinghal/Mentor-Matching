@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    Add Question
                </div>
                <div class="col-md-6">
                    <a href="{{ route('question.index') }}" class="btn btn-outline-primary create_btn">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('question.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="Question">Question</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" id="question" name="question"></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-2">
                            <label for="Question">Skill</label>
                        </div>
                        <div class="col-md-8">
                            <textarea class="form-control" rows="5" id="skill" name="skill"></textarea>
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
