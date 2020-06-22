@extends('layouts.layout')
@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container mt-3">
    <h2>Task List</h2>
    <div class="text-right"><a href="{{ route('taskCreate') }}">Create</a></div>
    <br>
    <table class="table table-bordered" id="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Priority</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="tablecontents">
        @foreach($tasks as $task)
            <tr>
                <td class="name">{{$task->name}}</td>
                <td class="priority">{{$task->priority}}</td>
                <td>
                    <input type="hidden" class="projectId"  value="{{$task->projectId}}"/>
                <form method="POST" action="/tasks/{{$task->id}}" >
                        @csrf
                        @method('DELETE')

                        <a href="tasks/edit/{{$task->id}}"><button type="button" class="btn btn-primary btn-sm">Edit</button></a>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

        @if(!$tasks || !count($tasks))
        <tr>
            <td colspan="3">There are no records to display.</td>
        </tr>
        @endif

        </tbody>
    </table>
</div>
@endsection
