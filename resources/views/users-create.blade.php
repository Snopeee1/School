@extends('layouts.user_type.admin')

@section('content')
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
</style>
<div class="container-fluid py-4">
    <div class="card">
      <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New User</h2>
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
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>LRN</strong>
                <input type="number" name="LRN" class="form-control" placeholder="LRN">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <strong>Email</strong>
              <input type="text" name="email"  class="form-control" placeholder="Email">
          </div>
        </div>
        <div class="form-group" hidden>
            <input type="text" name="role" value="user"class="form-control">
        </div>
        <div class="form-group">
          <strong>Password</strong>
            <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <div class="form-group" hidden>
            <input type="text" name="id"  class="form-control">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
    </div>
</div>


@endsection
