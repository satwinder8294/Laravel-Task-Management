@extends('layouts.layout')
@section('content')
<div class="container mt-3">
    <h2>Task Management</h2>
    <br>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#projects">Projects</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#tasks">Tasks</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="projects" class="container tab-pane active"><br>
        <form action="/projects" method="POST">
            <div class="form-group">
              <label for="email">Name:</label>
              <input type="email" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div id="tasks" class="container tab-pane fade"><br>
        <form action="/tasks" method="POST">
            <div class="form-group">
              <label for="email">Name:</label>
              <input type="text" class="form-control" id="name" placeholder="Enter task name" name="name">
            </div>
            <div class="form-group">
              <label for="pwd">Priority:</label>
              <input type="number" class="form-control" id="priority" placeholder="Enter priority" name="priority">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
      </div>
    </div>
  </div>

@endsection

