@extends('layouts.layout')
@section('content')
<div class="container mt-3">
    <h2>Create Project</h2>
    <br>

    <form action="/projects" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter project name" name="name">
          @if($errors->has('name'))
            <div class="text-danger" >{{ $errors->first('name') }}</div>
          @endif
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection

