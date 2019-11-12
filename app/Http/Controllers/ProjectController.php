<?php

namespace App\Http\Controllers;

use App\Project;  //uso de la vista
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Http\Requests\saveProjectRequesst;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $projects = Project::orderBy('created_at','DESC')->get();

    return view('projects.index',compact('projects'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return view\Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(saveProjectRequesst $request)
    {

        Project:: create( $request->validated() );

     return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrfail($id);
        return view('projects.show',['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::findOrfail($id);
        return view('projects.edit',['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, saveProjectRequesst $request)
    {

        $project->update(  $request->validated() );
        return redirect()->route('projects.show',['project' => $project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
      // Project::destroy::($id)    //por id
      $project->delete();
      return redirect()->route('projects.index');
    }
}
