<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProjectType::all();
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
    public function store(Request $request, ProjectType $projectType)
    {
        $validate = $request->validate([

            'name' => 'required|max:255'

        ]);

        if($validate){

            $projectType->name = $request->name;
            $projectType->save();

        }else{



        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectType $projectType, Request $request)
    {
        $show = $projectType->find($request->id);
        return $show;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectType $projectType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectType $projectType)
    {
        $validate = $request->validate([

            'id' => 'required',
            'name' => 'required|max:255'

        ]);

        if($validate){

            $update = $projectType->find($request->id);
            $update->name = $request->name;
            $update->save();

        }else{



        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectType  $projectType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectType $projectType, Request $request)
    {
        $delete = $projectType->find($request->id);
        $delete->delete();
    }
}
