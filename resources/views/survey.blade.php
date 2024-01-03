@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
    <div class="card">
      <form method="POST" action="{{ route('survey.store') }}" class="container">
        @csrf
        @include('survey::standard', ['survey' => $survey])
      </form>
    </div>
</div>

@endsection
