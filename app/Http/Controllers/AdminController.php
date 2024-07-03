<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Driver;
use App\Models\Company;
use App\Models\Session as SessionModel;
use Hash;
use Illuminate\Http\Request;
use Session;
use Validator;
use Auth;
use DB;
use App\Models\Vehicle;

class AdminController extends Controller
{
    
     //login page
    public function login()
    {
        if(isset(Auth::user()->id)){
            return redirect(route('trips.indexAll',1));
        }else{
            $session = SessionModel::where('status',1)->get();
            $company = Company::where('status',1)->get();
            return view('login',compact('session','company')); 
        }
    }
    
    //login page
    public function admin()
    {
        if(isset(Auth::user()->id)){
            return redirect(route('trips.indexAll',1));
        }else{
            return view('login'); 
        }
    }
    //end login page

    //login request
    public function loginPost(Request $request)
    {
         $input=$request->all();
        $validator = Validator::make($input,
            [
                'email' => 'required|email|max:255',
                'password' => 'required',
                'company' => 'required',
                'session' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
        
            Session::put('session', $request->session);
            Session::put('company', $request->company);
            return redirect(route('admin.dashboard'));
            $count = $user->count();
            if ($count != 0) {
                Session::put('id', $user->id);
                return redirect(route('admin.dashboard'));
            } else {
                return redirect()->back()->with('error', 'Email and Password does not match.');
            }

        }else {
                return redirect()->back()->with('error', 'Email and Password does not match.');
            }

    }
    //End login request

    //register page
    public function register()
    {
        return view('register');
    }
    //end register page

    //store Register Data
    public function registerStore(Request $request)
    {
        $request->all();
        $input = $request->all();

        $validator = Validator::make($input,
            [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|min:8|confirmed',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $input['password'] = Hash::make($request->password);
        $user = User::create($input);
        $count = $user->count();
        if ($count != 0) {
            Session::put('id', $user->id);
            return redirect(route('admin.dashboard'));
        }
        else{
            return redirect()->back()->with('error','Credetial not Match.');
        }

    }
    //End Register form

    //Start Admin Dashboard

    public function dashboard()
    {

        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        return view('admin.dashboard',compact('vehicles','drivers'));
    }


     public function logout()
    {
        Auth::logout();
        Session::forget('id');
        return redirect(route('login'));

    }



    public static function getValueStatic2($table,$column,$key,$value)
    {
         $result = DB::select("SELECT ".$column." FROM ".$table." WHERE ".$key." = ".$value);
         if(empty($result)) { return ''; } else { return $result[0]->$column; }
      
    }


    public static function getSelectOption(Request $request){
        $table = $request->table;       
        $id = $request->id;
        $key = $request->key;
        $value = $request->value;    
        $column = $request->column;

        $companyId = $this->companyId;
        $condition = array('companyId'=>$companyId, $key=>$value);

        $collection=DB::table($table)->where($condition)->get();
        $select_option='';
        $select_option.="<option value='' selected>Select</option>";
        foreach ($collection as $row) {
            $select_option.="<option value='".$row->$id."'>".$row->$column."</option>";
        }
        return $select_option;
    
    }

    public function getSelectOption2(Request $request){
        $table = $request->table;       
        $id = $request->id;        
        $column = $request->column;            
        $collection=DB::table($table)->where('status',1)->get();
        $select_option='';
        $select_option.="<option value='' >Select</option>";
        foreach ($collection as $row) {
            $select_option.="<option value='".$row->$id."'>".$row->$column."</option>";
        }
        return $select_option;    
    
    }


    public function fetchSelectTruck(Request $request){


        $table = $request->table;       
        $id = $request->id;        
        $column = $request->column;
        $column2 = $request->column2;            
        $collection=DB::table($table)->get();
        $select_option='';
        $select_option.="<option value='' selected>Select</option>";
        foreach ($collection as $row) {
            $getvahicle = DB::table('trips')->where('trips.vehicleNumber',$row->$id)->where('status',1)->get()->first();
            $data ='';
            if($getvahicle!=''){
                $data = " Not Available";
            }
            $select_option.="<option value='".$row->$id."'>".$row->$column ."(".$row->$column2.") ".$data." </option>";
        }
        return $select_option;  
        
    }



    public function fetchSelectCust(Request $request){


        $table = $request->table;       
        $id = $request->id;        
        $column = $request->column;
        $column2 = $request->column2;            
        $collection=DB::table($table)->get();
        $select_option='';
        $select_option.="<option value='' selected>Select</option>";
        foreach ($collection as $row) {
            $select_option.="<option value='".$row->$id."'>".$row->$column ."(".$row->$column2.") </option>";
        }
        return $select_option;  
        
    }


    public static function getVehicle(Request $request){

         $vehicle = DB::table('vehicles')->where('id',$request->id)->get();

        $ownership = $vehicle[0]->ownership;
        
        if($ownership=="Market Truck"){
         
         $res ='<label for="inputPassword4" class="form-label">Supplier Name </label>
         <select name="supplier_name" id="supplierName" class="form-control">
                <option value="">Select Supplier</option>';
            
              $suppliers = Supplier::where('id',$vehicle[0]->supplier_id)->get();
              foreach($suppliers as $row){
               $res .= '<option value="'.$row->id.'"'; 
                if($row->id==$vehicle[0]->supplier_id){ 
               
                }  
                $res.='>'.$row->supplierName.'</option>';
              }

              $res.='</select>';

              $response = array('data'=>$res,'ownership'=>$ownership);
              return json_encode($response,true);

        }

        if($ownership=="My Truck"){

            $res ='<label for="inputPassword4" class="form-label">Driver Name </label>
            <select name="supplier_name" class="form-control">
                <option value="">Select Driver</option>';
             
              $drivers = Driver::find($vehicle[0]->driver_id)->get();
              foreach($drivers as $rw){
               $res .= '<option value="'.$rw->id.'"'; 
                if($rw->id==$vehicle[0]->driver_id){ 
               $res.='selected';
                }  
                $res.='>'.$rw->driverName.'</option>';
              }

              $res.='</select>';


              $response = array('data'=>$res,'ownership'=>$ownership);
              return json_encode($response,true);
        }
    }

    public static function getRecords($table,$key,$id){

       return DB::table($table)
                ->where($key,$id)
                ->get();
    }

    public static function getRecords2($table,$key,$id,$key2,$value){

        return DB::table($table)
                 ->where($key,$id)
                 ->where($key2,$value)
                 ->get();
     }

    public function changePassword(){
        return view('admin.changePassword');
    }

    public function changePass(Request $request){
        $input=$request->all();
        $validator = Validator::make($input,
            [
                'oldPassword' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (Auth::attempt(['email' => Auth()->user()->email, 'password' => $request->oldPassword])) {
            $newPass = Hash::make($request->password);
            User::where('id',Auth::user()->id)->update(['password'=>$newPass]);
            Auth::logout();
            Session::forget('id');
            return redirect(route('login'))->with('error', 'Password change Succesfully. Please login again.');
        }else {
            return redirect()->back()->with('error', 'Old Password does not match.');
        }

    }
}
