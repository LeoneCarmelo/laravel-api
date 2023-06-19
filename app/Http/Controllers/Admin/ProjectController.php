<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $projects = Auth::user()->projects->sortByDesc('id');
        $projects = Project::where('user_id', Auth::user()->id)->orderByDesc('id')->paginate(5);
        //dd($projects);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Passing types to create
        $types = Type::orderByDesc('id')->get();
        //dd($types);
        $technologies = Technology::orderByDesc('id')->get();
        //dd($technologies);
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        //validation
        $val_data = $request->validated();
        //add slug + validation
        $slug = Project::generateSlug($val_data['title']);
        //dd($slug);
        $val_data['slug'] = $slug;
        $val_data['user_id'] = Auth::id();
        if ($request->hasFile('image')) {
            $img_path = Storage::put('images', $request->image);
            $val_data['image'] = $img_path;
        }
        //create new project
        $new_project = Project::create($val_data);
        //redirect to index
        if ($request->has('technologies')) {
            $new_project->technologies()->attach($request->technologies);
        }

        return to_route('admin.projects.index')->with('message', 'Project created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::orderByDesc('id')->get();
        //dd($types);
        $technologies = Technology::orderByDesc('id')->get();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['title']);
        
        $val_data['slug'] = $slug;
        
        if ($request->hasFile('image')) {
            //dd('here');

            //if project->image
            // delete the previous image

            if ($project->image) {
                Storage::delete($project->image);
            }

            // Save the file in the storage and get its path
            $image_path = Storage::put('uploads', $request->image);
            //dd($image_path);
            $val_data['image'] = $image_path;
        }

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }
     
        //create new project
        $project->update($val_data);
        //redirect to index
        return to_route('admin.projects.index')->with('message', 'Project updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //$project->technologies()->sync([]);
        if($project->image){
            Storage::delete($project->image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Project: ' . $project->title . ' deleted.');
    }
}
