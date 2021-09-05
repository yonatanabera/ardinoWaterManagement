<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        if(Auth::user()){
            
            return view('home');
        }else{
            
            return view('welcome');
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('register'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $input=[
            'name' =>$request->name,
            'deviceNumber'=>$request->deviceNumber,
            'deposite'=>$request->deposite,
            'remainingAmount'=>$request->deposite,
            'totalConsumption'=> $request->deposite * 6.0
        ];
        Customer::create($input); 
        Alert::toast('User registered!', 'success');
        return redirect(route('customer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=Customer::where("deviceNumber",$id)->first(); 
        // return $customer; 
        // Check the amount of m3 remaining, if it is low show warning
        // remaining amount = prepaid amount-used amount

        $remainingAmount=$customer->deposite-$customer->usedAmount;
        $usedAmount=$customer->usedAmount; 
      
        
        return view('show', compact('remainingAmount', 'usedAmount', 'customer')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $customer=Customer::find($id); 
        return view('update', compact('customer')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $customer=Customer::where("deviceNumber", $id)->first();
        // return $customer;
        $input=[
            'deposite'=>$request->deposite,
            'usedAmount' => 0,
            'totalLitres' => 0
        ];

         Customer::where('deviceNumber', $id)->update($input);
         Alert::toast('Balance Recharged!', 'success');
         return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lists(){
        $data=Customer::all();
        
        return DataTables::of($data)->editColumn('created_at', function($data){
            return $data->created_at->diffForHumans();
        })->editColumn('remainingAmount', function($data){
            return $data->deposite-$data->usedAmount;
        })->addColumn('action', function($data){
            $button='<form method="get" action="'.route('customer.show', $data->deviceNumber).'">'.csrf_field().'<button type="submit" value="" class="edit btn btn-outline-secondary btn-sm my-1 mx-1" >Show</button></form>';
            return $button;
        })->rawColumns(['action'])->make(true);
    }

    public function searchCustomer(Request $request){
        return redirect(route('customer.show', $request->deviceNumber)); 
    }
}
