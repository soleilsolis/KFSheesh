<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\ErrorMessages;

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
    public function create(ErrorMessages $errorMessages)
    {
        $data = [
            'id' => null,
            'name' => null,
            'user' => null,
            'description' => null,
            'company_name' => null,
            'status' => null,
            'modal-title' => 'New Project'
        ];

        return $errorMessages->data($data, '.main.modal',['.projectSave', '/app/project/store'],array(),['.delete-button']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project, ErrorMessages $errorMessages)
    {

        $validate = $request->validate([
            'name' => 'required|max:255',
            'project_type_id' => 'required',
        ]);

        $project->name = $request->name;
        $project->project_type_id = $request->project_type_id;
        $project->user_id = session('user')->id;
        $project->description = $request->description;
        $project->company_name = $request->company_name;
        $project->save();
        
        return $errorMessages->reload();
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
    public function edit(Request $request, Project $project, ErrorMessages $errorMessages)
    {
        $edit = $project->find($request->id);

        $validated = $request->validate([
            'id' => 'required'
        ]);
        
        $data = [
            'id' => $edit->id,
            'name' => $edit->name,
            'project_type' => $edit->projectType->name,
            'user' => $edit->user_id,
            'description' => $edit->description,
            'company_name' => $edit->company_name,
            'status' => $edit->status,
            'modal-title' => 'View Project'
        ];

        if(session('user')->type != 'admin'){

            $data['project_type'] = $edit->projectType->id;

        }

        return $errorMessages->data($data, '.main.modal', array(),['.delete-button']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, ErrorMessages $errorMessages)
    {   
        $validate = $request->validate([
            'id' => 'required',
        ]);

        $update = $project->find($request->id);

        if(session('user')->type == 'admin'){
            $update->status = 2;
        }else{
            $validate = $request->validate([
                'name' => 'required|max:255',
                'project_type_id' => 'required',
            ]);

            $update->name = $request->name;
            $update->project_type_id = $request->project_type_id;
            $update->description = $request->description;
            $update->company_name = $request->company_name;
        }

        $update->save();

        return $errorMessages->reload();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, Request $request, ErrorMessages $errorMessages)
    {
        $destroy = $project->find($request->id);
        $destroy->delete();

        return $errorMessages->reload();
    }
}
