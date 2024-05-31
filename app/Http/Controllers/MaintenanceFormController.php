<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceForm;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Driver;
use App\Models\Vendor;
use App\Models\Maintenance;
use Session;

class MaintenanceFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records =MaintenanceForm::all();
        return view('admin.maintenanceFormView',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle = Vehicle::where('status',1)->get();
        $driver = Driver::where('status',1)->get();
        $supp = Vendor::where('status',1)->get();
        $maintenance =Maintenance::where('status',1)->get();
        return view('admin.maintenanceFrom',compact('vehicle','supp','driver','maintenance'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input =  $request->all();
        $request->validate([
            'date'=>'required|date',
            'maintenance'=>'required',
            'vehicleNumber'=>'required',
            'driverName'=>'required',
            'meterReading'=>'required',
            'productType'=>'required',
            'shop_name'=>'required|max:150',
            'staff'=>'max:100',
            'place'=>'max:150',
            'self_warranty'=>'required',
            'paymentType'=>'required',
            'notes'=>'max:255',
         ]  
        );
        $company = Session::get('company');
        $session = Session::get('session');
        $input['date'] = date('Y-m-d',strtotime($request->date));
        $input['comapany_id'] = isset($company) ? $company : '';
        $input['created_by'] = isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['session_id'] = isset($session) ? $session : '';
        $res = MaintenanceForm::create($input);
        return redirect(route('maintenanceForm.index'))->with('success','Maintenance updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaintenanceForm  $maintenanceForm
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceForm $maintenanceForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaintenanceForm  $maintenanceForm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::where('status',0)->get();
        $driver = Driver::where('status',1)->get();
        $supp = Vendor::where('status',1)->get();
        $maintenance =Maintenance::where('status',1)->get();
        $data =MaintenanceForm::find($id);
        return view('admin.maintenanceFrom',compact('vehicle','supp','driver','maintenance','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MaintenanceForm  $maintenanceForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input =  $request->all();
        $request->validate([
            'date'=>'required|date',
            'maintenance'=>'required',
            'vehicleNumber'=>'required',
            'driverName'=>'required',
            'meterReading'=>'required',
            'productType'=>'required',
            'shop_name'=>'required|max:150',
            'staff'=>'max:100',
            'place'=>'max:150',
            'self_warranty'=>'required',
            'paymentType'=>'required',
            'notes'=>'max:255',
         ]  
        );

        $input['date'] = date('Y-m-d',strtotime($request->date));
        $input['comapany_id'] = isset($company) ? $company : '0';
        $input['created_by'] = isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['session_id'] = isset($session) ? $session : '0';
        unset($input['_method']);
        unset($input['_token']);
        $res = MaintenanceForm::where('id',$id)->update($input);
        return redirect(route('maintenanceForm.index'))->with('success','Maintenance updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaintenanceForm  $maintenanceForm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MaintenanceForm::where('id',$id)->delete();
        return redirect(route('maintenanceForm.index'))->with('success','Maintenance deleted successfully');
    }
}
