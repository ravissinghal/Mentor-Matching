@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    {{ $quest->question }}
                </div>
                <div class="col-md-6">
                    <a href="{{ route('question.index') }}" class="btn btn-outline-primary">Back</a>
                    <a href="{{ route('question.OptionCreate',['question'=>$quest->id]) }}" class="btn btn-outline-primary">Create</a>
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
                            <th scope="col">Option Id</th>
                            <th scope="col">Question Option</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($options as $opt)

                            <tr>
                                <td>{{ $opt->id }}</td>
                                <td>{{ $opt->option }}</td>
                                <td>
                                    <div class="row">
                                        <form action="{{ route('question.OptionEdit',['option'=>$opt->id]) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-info action_btn2"><i class="fas fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('question.OptionDestroy', ['option' => $opt->id]) }}" method="POST">
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
