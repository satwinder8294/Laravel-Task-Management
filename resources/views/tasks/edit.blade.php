@extends('layouts.layout')
@section('content')

<div class="container mt-3">
    <h2>Edit Task</h2>
    <br>
<form action="/tasks/{{$task->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="email">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter task name" name="name" value="{{$task->name}}">
            @if($errors->has('name'))
                <div class="text-danger" >{{ $errors->first('name') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="pwd">Priority:</label>
            <input type="number" class="form-control" id="priority" placeholder="Enter priority" name="priority" value="{{$task->priority}}">
            @if($errors->has('priority'))
                <div class="text-danger" >{{ $errors->first('priority') }}</div>
            @endif
        </div>
        <div class="form-group">
            <label for="pwd">Project:</label>
            <select class="form-control" id="projectId" name="projectId" value="{{$task->projectId}}">
                @foreach($projects as $project)
            <option value="{{$project->id}}">{{$project->name}}</option>
                @endforeach
            </select>
            @if($errors->has('projectId'))
                <div class="text-danger" >{{ $errors->first('projectId') }}</div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-light">Cancel</button>
    </form>
</div>
@endsection
