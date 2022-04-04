@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
        Users
        </div>
    </div>
    <div class="table-responsive-md">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Type</th>
                  <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if($user->type != 0)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @if($user->type == 1)
                                <td>Mentee</td>
                            @else
                                <td>Mentor</td>
                            @endif
                            <td>
                                <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                    @csrf

                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger "><i class="fas fa-trash"></i></button>

                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>





@endsection
