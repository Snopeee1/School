@extends('layouts.user_type.admin')

@section('content')
<div class="container-fluid" style="width: 1050px;">
    <div class="card mg-4 style="width: 150px;"">
      <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('survey-questions.create') }}"> Create New Question</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-hover">
    <tr>
        <th>No</th>
        <th>Question</th>
        <th>Actions</th>
    </tr>
    @foreach ($surveyQuestions as $surveyQuestion)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $surveyQuestion->content }}</td>
        <td>
            <form action="{{ route('survey-questions.destroy',$surveyQuestion->id) }}" method="POST">
                <!--<a class="btn btn-primary" href="{{ route('survey-questions.edit',$surveyQuestion->id) }}">Edit</a> -->

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $surveyQuestions->links() !!}
    </div>
</div>

@endsection
