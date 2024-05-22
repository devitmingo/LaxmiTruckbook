<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Driver::orderBy('id','DESC')->get();
        return view('admin.driverView',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.driver');
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
        $request->validate([
            'driverName'=>'required|max:255',
            'mobile'=>'required|max:10|min:10|unique:drivers',
            'mobile2'=>'max:10|min:10',
            'aadhar_number'=>'max:30',
            'driving_licence_number'=>'max:30',
        ]);
        $driver_photo ='';
        if ($request->hasFile('driver_photo')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('driver_photo');
            $driver_photo = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/driver';
            $file->move($destinationPath, $driver_photo);
           
        }
        $aadhar_document ='';
        if ($request->hasFile('aadhar_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('aadhar_document');
            $aadhar_document = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/driver';
            $file->move($destinationPath, $aadhar_document);
           
        }

        $driving_licence_document ='';
        if ($request->hasFile('driving_licence_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('driving_licence_document');
            $driving_licence_document = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/driver';
            $file->move($destinationPath, $driving_licence_document);
           
        }

    
        $input['driver_photo']=$driver_photo;
        $input['aadhar_document']=$aadhar_document;
        $input['driving_licence_document']=$driving_licence_document;
      
        $res = Driver::create($input);
        return redirect()->back()->with('success','Driver Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Driver::find($id);
        return view('admin.driver',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();

        $request->validate([
            'driverName'=>'required|max:255',
            'mobile'=>'required|max:10|min:10|unique:drivers,id,'.$id,
            'mobile2'=>'max:10|min:10',
            'aadhar_number'=>'max:30',
            'driving_licence_number'=>'max:30',
        ]);

        $fileName ='';
        if ($request->hasFile('driver_photo')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('driver_photo');
            $fileName = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/driver';
            $file->move($destinationPath, $fileName);
            $input['driver_photo']=$fileName;
        }
        $fileName1 ='';
        if ($request->hasFile('aadhar_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('aadhar_document');
            $fileName1 = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/driver';
            $file->move($destinationPath, $fileName1);
            $input['aadhar_document']=$fileName1;
        }

        $fileName2 ='';
        if ($request->hasFile('driving_licence_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('driving_licence_document');
            $fileName2 = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/driver';
            $file->move($destinationPath, $fileName2);
            $input['driving_licence_document']=$fileName2;
        }

        unset($input['_method']);
        unset($input['_token']);
        $res = Driver::where('id',$id)->update($input);
        return redirect(route('driver.index'))->with('success','Driver Upated successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Driver::where('id',$id)->delete();
        return redirect(route('driver.index'))->with('success','Driver Deleted successfully');
   
    }
}
