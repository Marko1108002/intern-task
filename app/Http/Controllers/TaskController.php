<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(Project $project)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('tasks.create', compact('project'));
    }

    public function store(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);
        $task = new Task($request->all());
        $task->project_id = $project->id;
        $task->save();

        return redirect()->route('projects.show', $project->id);
    }

    public function show(Project $project, Task $task)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('tasks.show', compact('project', 'task'));
    }


    public function destroy(Project $project, Task $task)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $task->delete();

        return redirect()->route('projects.show', $project->id)
            ->with('success', 'Task deleted successfully');
    }
    public function edit(Project $project, Task $task)
    {
        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('tasks.edit', compact('project', 'task'));
    }


    public function update(Request $request, Task $task)
    {


        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update($request->only(['name', 'description']));

        return redirect()->route('projects.show', $task)->with('success', 'Task updated successfully');
    }
}
