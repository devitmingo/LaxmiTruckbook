<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\AdvanceType;
use App\Models\Head;
use Illuminate\Http\Request;
use App\Models\Vendor;
use Session;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = Transaction::where('status',0)->get();
        if(isset($request->from_date) && isset($request->to_date))
        {
            $fromDate = date('Y-m-d', strtotime($request->from_date));
            $toDate = date('Y-m-d', strtotime($request->to_date));
            }else{
            $startDate = now()->subDays(30);
            $fromDate = date('Y-m-d', strtotime($startDate));
            $toDate = date('Y-m-d', strtotime(date('Y-m-d'))); 
        }
      
        $records = $records->WhereBetween('trans_date',[$fromDate,$toDate]);
        
        //return $records;
       return view('admin.transView',compact('records','fromDate','toDate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $pay_types = AdvanceType::all();
         $vendor = Vendor::where('status',1)->get();
         $heads = Head::all();
        return view('admin.trans',compact('pay_types','heads','vendor'));
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
            'trans_type'=>'required|max:10',
            'pay_type'=>'required',
            'amount'=>'required',
            'trans_date'=>'required',
            'notes'=>'required',
        ]);

       $input['trans_date']=date('Y-m-d',strtotime($request->trans_date));
       if($request->trans_type=='Income'){
        $input['page']='10';
       }
       if($request->trans_type=='Expenses'){
        $input['page']='11';
       }
       if($request->trans_type=='Vendor'){
        $input['page']='12';
       }

       $company = Session::get('company');
         $session = Session::get('session');

       $input['head_type'] = isset($request->vendor_name) ? $request->vendor_name : $request->head_type;
       $input['comapany_id'] = isset($company) ? $company : '0';
       $input['createdby'] = isset(auth()->user()->id) ? auth()->user()->id : 0;
       $input['session_id'] = isset($session) ? $session : '0';
       Transaction::create($input);

       return redirect()->back()->with('success','Transaction add Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pay_types = AdvanceType::all();
         $vendor = Vendor::where('status',1)->get();
         $heads = Head::all();
         $data  = Transaction::find($id);
        return view('admin.trans',compact('pay_types','heads','vendor','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $request->validate([
            'trans_type'=>'required|max:10',
            'pay_type'=>'required',
            'amount'=>'required',
            'trans_date'=>'required',
            'notes'=>'required',
        ]);

        $input['trans_date']=date('Y-m-d',strtotime($request->trans_date));
        if($request->trans_type=='Income'){
         $input['page']='10';
        }
        if($request->trans_type=='Expenses'){
         $input['page']='11';
        }
        if($request->trans_type=='Vendor'){
         $input['page']='12';
        }
 
        $input['head_type'] = isset($request->vendor_name) ? $request->vendor_name : $request->head_type;
        $input['comapany_id'] = isset($company) ? $company : '0';
        $input['createdby'] = isset(auth()->user()->id) ? auth()->user()->id : 0;
        $input['session_id'] = isset($session) ? $session : '0';
        unset($input['_method']);
        unset($input['_token']);
        Transaction::where('id',$id)->update($input);
 
        return redirect(route('trams.index'))->with('success','Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Transaction::where('id',$id)->update(['status'=>1]);
        return redirect()->back()->with('success','Transaction deleted successfully');
    }
}
