<?php

namespace App\Http\Controllers;

use App\Flight;
use App\User;
use App\Airline;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function test(){

    //     $user=Airline::find('1');
    //      dd($user->flights);
    // }
    public function index()
    {
         $flight=Flight::all();
        return \Response::json($flight);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function store(Request $request)
    {
        
         $flight= Flight::create([
      'to'=>$request['to'],
      'from'=> $request['from']
        ]);
    // $airlines=$request['airline'];
    // foreach($airlines as $airline){

    // $airClass=Airline::find($airline);
    // $flight->airlines()->attach($airClass,array(
    // "id"=>"2",
    //  "price"=>'300'
    //   ));
    //    }
       // dd($airport);
        return \Response::json($flight);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function search($to,$from)
    {    
        $flight=Flight::where('to','=',$to)->where('from','=',$from)->get();
        return \Response::json($flight);
    }

  
    public function show(Flight $flight)
    {
           
        $flt =flight::find($flight->id);
        return \Response::json($flt);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
         Flight::find($flight->id)->update([
        'to'=>$request['to'],
      'from'=> $request['from']
        ]);
     $flight=Flight::find($flight->id);
    return \Response::json($flight);


            }


}
