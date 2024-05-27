<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\TruckType;
use App\Models\Driver;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Session;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Vehicle::orderBy('id','desc')->get();
        return view('admin.vehicleView',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicleType= TruckType::orderBy('truckName','ASC')->get();
        $drivers= Driver::orderBy('driverName','ASC')->get();
        $suppliers= Supplier::orderBy('supplierName','ASC')->get();
        return view('admin.vehicle',compact('vehicleType','drivers','suppliers'));
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
            'vehicleNumber'=>'required|max:12|unique:vehicles',
            'vehicleType'=>'required||max:30',
            'ownership'=>'required',
            'driver_name'=>'max:20',
            'vehicle_tyre'=>'required|max:5',
            'vehicle_model'=>'max:20',
            'manufacturer_company'=>'max:70',
            'chassis_no'=>'max:30',
            'engine_no'=>'max:30',
         ]
            
        );
        $fileName ='';
        if ($request->hasFile('r_c_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('r_c_document');
            $fileName = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/vehicle_doc';
            $file->move($destinationPath, $fileName);
           
        }

        $fitness_document ='';
        if ($request->hasFile('fitness_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('fitness_document');
            $fitness_document = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/vehicle_doc';
            $file->move($destinationPath, $fitness_document);
           
        }

        $tax_pay_document ='';
        if ($request->hasFile('tax_pay_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('tax_pay_document');
            $tax_pay_document = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/vehicle_doc';
            $file->move($destinationPath, $tax_pay_document);
           
        }

        $permit_document ='';
        if ($request->hasFile('permit_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('permit_document');
            $permit_document = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/vehicle_doc';
            $file->move($destinationPath, $permit_document);
           
        }

        $insurance_document ='';
        if ($request->hasFile('insurance_document')) {
            $rand_val = date('YMDHIS') . rand(11111, 99999);
            $image_file_name = md5($rand_val);
            $file = $request->file('insurance_document');
            $insurance_document = $image_file_name . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path() . '/vehicle_doc';
            $file->move($destinationPath, $insurance_document);
           
        }

         $input['supplier_id']=$request->supplierName;
         unset($input['supplierName']);
         $input['driver_id']=$request->driverName;
         unset($input['driverName']);
         $input['r_c_document']=$fileName;
         $input['fitness_document']=$fitness_document;
         $input['tax_pay_document']=$tax_pay_document;
         $input['permit_document']=$permit_document;
         $input['insurance_document']=$insurance_document;
         //$input['insurance_start_date'] = date('Y-m-d',strtotime($request->insurance_start_date));
         $input['insurance_expiry_date'] = date('Y-m-d',strtotime($request->insurance_expiry_date));
         $input['fitness_expiry_date'] = date('Y-m-d',strtotime($request->fitness_expiry_date));
         $input['tax_pay_expiry_date'] = date('Y-m-d',strtotime($request->tax_pay_expiry_date));
         $input['permit_expiry_date'] = date('Y-m-d',strtotime($request->permit_expiry_date));
         $input['r_c_expiry_date'] = date('Y-m-d',strtotime($request->r_c_expiry_date));
         $input['status']=0;
         $company = Session::get('company');
         $session = Session::get('session');
         $input['created_by']=isset(auth()->user()->id) ? auth()->user()->id : 0;
         $input['comapany_id']=isset(auth()->user()->comapany_id) ? auth()->user()->comapany_id : 0;
         $res = Vehicle::create($input);
        return redirect()->back()->with('success','Vehicle added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicleType= TruckType::orderBy('truckName','ASC')->get();
        $drivers= Driver::orderBy('driverName','ASC')->get();
        $suppliers= Supplier::orderBy('supplierName','ASC')->get();
        $data = Vehicle::find($id);
        return view('admin.vehicle',compact('vehicleType','drivers','suppliers','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input =  $request->all();
    
        $request->validate([
           'vehicleNumber'=>'required|max:12|unique:vehicles,id,'.$id,
           'vehicleType'=>'required|max:30',
           'ownership'=>'required',
           'driver_name'=>'max:20',
           'vehicle_tyre'=>'required|max:5',
           'vehicle_model'=>'max:20',
           'manufacturer_company'=>'max:70',
           'chassis_no'=>'max:30',
           'engine_no'=>'max:30'
        ]
           
       );
       $fileName ='';
       if ($request->hasFile('r_c_document')) {
           $rand_val = date('YMDHIS') . rand(11111, 99999);
           $image_file_name = md5($rand_val);
           $file = $request->file('r_c_document');
           $fileName = $image_file_name . '.' . $file->getClientOriginalExtension();
           $destinationPath = public_path() . '/vehicle_doc';
           $file->move($destinationPath, $fileName);
           $input['r_c_document']=$fileName;
       }

       $fitness_document ='';
       if ($request->hasFile('fitness_document')) {
           $rand_val = date('YMDHIS') . rand(11111, 99999);
           $image_file_name = md5($rand_val);
           $file = $request->file('fitness_document');
           $fitness_document = $image_file_name . '.' . $file->getClientOriginalExtension();
           $destinationPath = public_path() . '/vehicle_doc';
           $file->move($destinationPath, $fitness_document);
           $input['fitness_document']=$fitness_document;
          
       }

       $tax_pay_document ='';
       if ($request->hasFile('tax_pay_document')) {
           $rand_val = date('YMDHIS') . rand(11111, 99999);
           $image_file_name = md5($rand_val);
           $file = $request->file('tax_pay_document');
           $tax_pay_document = $image_file_name . '.' . $file->getClientOriginalExtension();
           $destinationPath = public_path() . '/vehicle_doc';
           $file->move($destinationPath, $tax_pay_document);
           $input['tax_pay_document']=$tax_pay_document;
          
       }

       $permit_document ='';
       if ($request->hasFile('permit_document')) {
           $rand_val = date('YMDHIS') . rand(11111, 99999);
           $image_file_name = md5($rand_val);
           $file = $request->file('permit_document');
           $permit_document = $image_file_name . '.' . $file->getClientOriginalExtension();
           $destinationPath = public_path() . '/vehicle_doc';
           $file->move($destinationPath, $permit_document);
           $input['permit_document']=$permit_document;
       }
       $insurance_document ='';
       if ($request->hasFile('insurance_document')) {
           $rand_val = date('YMDHIS') . rand(11111, 99999);
           $image_file_name = md5($rand_val); 
           $file = $request->file('insurance_document');
           $insurance_document = $image_file_name . '.' . $file->getClientOriginalExtension();
           $destinationPath = public_path() . '/vehicle_doc';
           $file->move($destinationPath, $insurance_document);
           $input['insurance_document']=$insurance_document;
          
       }
        $input['supplier_id']=$request->supplierName;
        unset($input['supplierName']);
        $input['driver_id']=$request->driverName;
        unset($input['driverName']);
        
        //$input['insurance_start_date'] = date('Y-m-d',strtotime($request->insurance_start_date));
        $input['insurance_expiry_date'] = date('Y-m-d',strtotime($request->insurance_expiry_date));
        $input['fitness_expiry_date'] = date('Y-m-d',strtotime($request->fitness_expiry_date));
        $input['tax_pay_expiry_date'] = date('Y-m-d',strtotime($request->tax_pay_expiry_date));
        $input['permit_expiry_date'] = date('Y-m-d',strtotime($request->permit_expiry_date));
        $input['r_c_expiry_date'] = date('Y-m-d',strtotime($request->r_c_expiry_date));

        $input['status']=0;
        $input['comapany_id'] = isset($company) ? $company : '0';
        $input['created_by'] = isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['session_id'] = isset($session) ? $session : '0';
         unset($input['_method']);
         unset($input['_token']);
         

        $res = Vehicle::where('id',$id)->update($input);
        return redirect(route('vehicle.index'))->with('success','Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $res = Vehicle::where('id',$id)->delete();
        return redirect()->back()->with('success','Vehicle Deleted successfully');
    }
}
