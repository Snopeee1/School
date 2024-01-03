@extends('layouts.user_type.admin')

@section('content')
<div class="container-fluid py-4">
    <div class="card">
      <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Survey Results</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <tr>
                        <td>{{ $log->name }}</td>
                        <td>{{ $log->results }}</td>
                        <td>{{ $log->date }}</td>
                        <td>{{ $log->time }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
