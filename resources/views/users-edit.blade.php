@extends('layouts.user_type.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card">
      <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users-list.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('users-list.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name</strong>
                <input type="text" name="name" value="{{ $users->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>LRN</strong>
              <input type="number" name="LRN" value="{{ $users->LRN }}" class="form-control" placeholder="LRN">
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Email</strong>
              <input type="text" name="email" value="{{ $users->email }}" class="form-control" placeholder="Email">
          </div>
        </div>
        <div class="form-group" hidden>
            <input type="text" name="role" value="{{ $users->role }}" class="form-control">
        </div>
        <div class="form-group" hidden>
            <input type="text" name="password" value="{{ $users->password }}" class="form-control">
        </div>
        <div class="form-group" hidden>
            <input type="text" name="id" value="{{ $users->id }}" class="form-control">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
    </div>
</div>


@endsection
