@extends('layouts.layout')
@section('content')

<div class="container mt-3">
    <h2>Project List</h2>
    <div class="text-right"><a href="{{ route('projectCreate') }}">Create</a></div>
    <br>
    <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
          </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
            </tr>
        @endforeach

        @if(!$projects || !count($projects.length))
        <tr>
            <td >There are no records to display.</td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
@endsection
