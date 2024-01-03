@extends('layouts.user_type.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card">
      <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Question</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('survey-questions.index') }}"> Back</a>
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

<form action="{{ route('survey-questions.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content</strong>
                <textarea class="form-control" style="height:150px" name="content" placeholder="Content"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Course:</strong><select name="course">
                  @foreach($courses as $course)
                  <option value="{{ $course->code }}">{{ $course->name }}</option>
                  @endforeach
                </select>

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
    </div>
</div>

@endsection
