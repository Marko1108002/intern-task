<?php

namespace App\Http\Middleware;

use App\Models\Project;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;



class CheckProjectOwner
{

    public function handle(Request $request, Closure $next)
    {
        $projectId = $request->route('project');
 
        $project = Project::findOrFail($projectId);

        if ($project->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}


