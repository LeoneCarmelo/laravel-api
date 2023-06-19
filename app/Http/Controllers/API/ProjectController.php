<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        
        $projects = Project::with(['type', 'technologies', 'user'])->where('user_id',  1)->orderByDesc('id')->paginate(3);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show ($slug) {
        $project = Project::with(['type', 'technologies', 'user'])->where('slug', $slug)->first();

        if ($project) {
            return response()->json([
                'success' => true,
                'result' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Project not found 404'
            ]);
        }
    }

}
