@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    Questions
                </div>
                <div class="col-md-6">
                    <a href="{{ route('question.create') }}" class="btn btn-outline-primary create_btn">Create</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive-md">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Question</th>
                            <th scope="col">Skill</th>
                            <th scope="col">Option</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $quest)

                            <tr>
                                <td>{{ $quest->id }}</td>
                                <td>{{ $quest->question }}</td>
                                <td>{{  $quest->skill }}</td>
                                <td>
                                    <form action="{{ route('question.OptionIndex',['question'=>$quest->id]) }}" method="GET">
                                        <button type="submit" class="btn btn-info "><i class="fas fa-prescription-bottle"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <div class="row">
                                        <form action="{{ route('question.edit',['question'=>$quest->id]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-info action_btn2"><i class="fas fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('question.destroy', ['question' => $quest->id]) }}" method="POST">
                                            @csrf

                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger action_btn2"><i class="fas fa-trash"></i></button>

                                        </form>
                                    </div>

                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
