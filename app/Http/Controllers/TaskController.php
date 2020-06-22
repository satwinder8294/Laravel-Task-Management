<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;

class TaskController extends Controller
{
    //
    public function index () {
        $tasks = Task::orderBy('priority', 'asc')->get();

        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create () {
        $projects = Project::all()->sortByDesc("name");

        return view('tasks.create', ['projects' => $projects]);
    }

    public function edit ($id) {
        $task = Task::findOrFail($id);
        $projects = Project::all()->sortByDesc("name");

        return view('tasks.edit', ['task' => $task, 'projects' => $projects]);
    }

    public function update ($id, Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'projectId' => 'required',
            'priority' => 'required',
        ]);
        $task = Task::findOrFail($id);
        $task->name = $request->name;
        $task->projectId = $request->projectId;
        $task->priority = $request->priority;

        $task->save();

        return redirect()->route('tasks');
    }

    public function updateBulk (Request $request) {

        if ($request->tasks && count($request->tasks) > 0) {
            Task::truncate();
            foreach($request->tasks as $taskObj) {
                $task = new Task();
                $task->name = $taskObj['name'];
                $task->projectId = $taskObj['projectId'];
                $task->priority = $taskObj['priority'];

                $task->save();
            }
            return "{status: 1, data: 'success'}";
        } else {
            return  "{status: 0, data: 'Missing required parameteres'}";
        }
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'projectId' => 'required',
        //     'priority' => 'required',
        // ]);
        // $task = Task::findOrFail($id);
        // $task->name = $request->name;
        // $task->projectId = $request->projectId;
        // $task->priority = $request->priority;

        // $task->save();

        // return redirect()->route('tasks');
    }

    public function store (Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'projectId' => 'required',
            'priority' => 'required',
        ]);
        $task = new Task();
        $task->name = $request->name;
        $task->projectId = $request->projectId;
        $task->priority = $request->priority;

        $task->save();

        return redirect()->route('tasks');
    }

    public function destroy ($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('tasks');
    }
}
