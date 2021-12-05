<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Project::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {

        $validate = $request->validate([

            'name' => 'required|max:255',
            'project_type_id' => 'required',
            'user_id' => 'required',

        ]);

        if($validate){

            $project->name = $request->name;
            $project->project_type_id = $request->project_type_id;
            $project->user_id = $request->user_id;
            $project->description = $request->description;
            $project->company_name = $request->company_name;
            $project->status = $request->status;
            $project->save();

        }else{

            

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Request $request)
    {
        $show = $project->find($request->id);
        return $show;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $validate = $request->validate([

            'id' => 'required',
            'name' => 'required|max:255',
            'project_type_id' => 'required',
            'user_id' => 'required',

        ]);

        if($validate){
            
            $update = $project->find($request->id);
            $update->name = $request->name;
            $update->project_type_id = $request->project_type_id;
            $update->user_id = $request->user_id;
            $update->description = $request->description;
            $update->company_name = $request->company_name;
            $update->status = $request->status;
            $update->save();

        }else{

            

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Request $request)
    {
        $destroy = $project->find($request->id);
        $destroy->delete();
    }
}
