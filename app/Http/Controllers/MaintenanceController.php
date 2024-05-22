<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Maintenance::orderBy('id','ASC')->get();
        return view('admin.maintenance',compact('records'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate(['name'=>'required:max:255|unique:states']);
        unset($input['_token']);
        $res = Maintenance::create($input);

        return redirect()->back()->with('success','Maintenance Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $records = Maintenance::orderBy('id','ASC')->get();
        $data = Maintenance::find($id);
        return view('admin.maintenance',compact('records','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();

        $request->validate(['name'=>'required:max:255|unique:states,id,'.$id]);

        unset($input['_method']);
        unset($input['_token']);
        $res = Maintenance::where('id',$id)->update($input);

        return redirect(route('maintanace.index'))->with('success','Maintenance Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Maintenance::find($id)->update(['status'=>0]);

            return redirect(route('maintanace.index'))->with('success','Maintenance Deleted Successfully');
    }
}
