<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        
        $projects = Project::with(['type', 'technologies', 'user'])->where('user_id',  1)->orderByDesc('id')->paginate(5);
        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

}
