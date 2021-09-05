<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use File; 

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "well";
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
        //
        $flowRate=$request->flowRate ; 
        $totalCost= $request->totalCost;
        $totalVolume= $request->totalLitres;
        $deviceId=123456789;

        Customer::where('deviceNumber', $deviceId)->update([
            'usedAmount' => $totalCost,
            'totalLitres' => $totalVolume
        ]);
        
        File::append(public_path('file.txt'), "\nFlowRate: ".$request->flowRate." \tTotalCost: ".$request->totalCost."\tTotalLitres: ".$request->totalLitres);
        return response('Element Recorded', 200)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function LEDState(){
        
        if(File::get(public_path('LEDState.txt'))==1){
            File::put(public_path('LEDState.txt'), 0);
            return 0;
        }else{
            File::put(public_path('LEDState.txt'), 1);
            return 1; 
        }
    }
}
