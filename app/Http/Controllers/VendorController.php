<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\MaintenanceForm;
use DB;
use App\Models\Tyre;
use App\Models\Urearefilling;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Vendor::where('status',1)->get();
        return view('admin.vendorView',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendor');
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
            'vendorName'=>'required|max:255',
            'mobile'=>'required|max:10|min:10|unique:vendors',
            'mobile2'=>'required|max:10|min:10',
            'status'=>'required'
            ]);

        $res = Vendor::create($input);
        return redirect()->back()->with('success','Vendor added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Vendor::find($id);
        return view('admin.vendor',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();

        $request->validate([
            'vendorName'=>'required|max:255',
            'mobile'=>'required|max:10|min:10|unique:vendors,id,'.$id,
            'mobile2'=>'required|max:10|min:10',
            'status'=>'required'
            ]);

        $res = Vendor::create($input);
        return redirect()->back()->with('success','Vendor added successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        //
    }

    public function VendorOpening($date,$id){
        $newDate = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $date) ) ));
        $openBal = 0;
        $trans = Transaction::where('trans_type','Vendor')->where('head_type',$id)->where('trans_date','<=', $newDate)->sum('amount');
        $main = MaintenanceForm::where('date','<=', $newDate)->where('vendorName',$id)->sum('amount');
        $urearefilling = Urearefilling::where('refilling_date','<=', $newDate)->where('vendorName',$id)->sum('amount');
        $tyre = Tyre::where('upload_date','<=', $newDate)->where('vendor_name',$id)->sum('amount');
        return $total = $main + $tyre + $urearefilling - $trans ;
    }
    public function vendorReports(Request $request){

        if(isset($request->fromDate) && isset($request->toDate))
       {
        $fromDate = date('Y-m-d', strtotime($request->fromDate));
        $toDate = date('Y-m-d', strtotime($request->toDate));
       }else{
        $fromDate = date('Y-m-d', strtotime(date('Y-m-d')));
        $toDate = date('Y-m-d', strtotime(date('Y-m-d'))); 
       }

       //condition
        $condition="date between '".$fromDate."' AND '".$toDate."' AND paymentType='credit' AND vendorName = '".$request->vendorName."'";
        
        $condition2="trans_date between '".$fromDate."' AND '".$toDate."' AND trans_type = 'Vendor' AND head_type ='".$request->vendorName."'";
        
        $condition3="refilling_date between '".$fromDate."' AND '".$toDate."' AND paymentType='credit' AND vendorName = '".$request->vendorName."'";

        $condition4 ="upload_date between '".$fromDate."' AND '".$toDate."' AND paymentType='credit' AND vendor_name = '".$request->vendorName."'";
        
        $openingBalance = $this->VendorOpening($fromDate,$request->vendorName);

        


        $records = DB::select("SELECT id AS id, date as date, vehicleNumber as name, amount AS amount ,paymentType,type,page FROM maintenance_forms  WHERE $condition
        UNION 
        SELECT id AS id, refilling_date as date, vehicle_id as name, amount AS amount ,paymentType,type,page FROM urearefillings  WHERE $condition3
        UNION
        SELECT id AS id, upload_date as date, vechicle_id as name, amount AS amount ,paymentType,type,page FROM tyres  WHERE $condition4
        UNION 
        SELECT id AS id,trans_date AS date,head_type as name ,amount AS amount, pay_type as paymentType,type,page FROM transactions WHERE $condition2 order by date
         ");  
      
       
        return  view('admin.vendorReport',compact('records','openingBalance'));
    }

    public function CurrentVendorOpning(Request $request){
        $id = $request->vendor_name;
        $trans = Transaction::where('trans_type','Vendor')->where('head_type',$id)->sum('amount');
        $main = MaintenanceForm::where('vendorName',$id)->sum('amount');
        $urearefilling = Urearefilling::where('vendorName',$id)->sum('amount');
        $tyre = Tyre::where('vendor_name',$id)->sum('amount');
        return $total = $main + $tyre + $urearefilling - $trans ;
    }
}
