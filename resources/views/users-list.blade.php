@extends('layouts.user_type.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card">
      <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users-list.create') }}"> Create New Student</a>
        </div>
    </div>
</div>
      <table class="table table-bordered">
            <thead>
                <tr>
                    <th>LRN</th>
                    <th>Name
                    <th>Email</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->LRN }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                          <form action="{{ route('user.delete',$user->id) }}" method="POST">

                          <a class="btn btn-primary" href="{{ route('user.edit',$user->id) }}">Edit</a>

                          @csrf
                          @method('DELETE')

                          <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
</div>

@endsection
