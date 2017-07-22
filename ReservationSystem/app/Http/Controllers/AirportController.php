<?php

namespace App\Http\Controllers;

use App\Flight;
use App\User;
use App\Airport;
use App\Airline;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airport=Airport::all();
        return \Response::json($airport);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //  dd($request['city_id']);

   $airport= Airport::create([
      'name'=>$request['name'],
      'city_id'=> $request['city_id']
        ]);
   Airport::reindex();

       // dd($airport);
        return \Response::json($airport);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
           
        $airport =Airport::find($airport->id);
        return \Response::json($airport);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airport $airport)
    {
        
        Airport::find($airport->id)->update([
        'name'=>$request['name'],
        'city_id'=> $request['city_id']
        ]);
     $airport=Airport::find($airport->id);
    return \Response::json($airport);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airport $airport)
    {
          Airport::find($airport->id)->delete();
    }

    public function search($airport){
       // $airports=Airport::where('name','like','%'.$airport.'%')->get();

        //$airports=Airpot::search($airport);
        $airports=Airport::search($airport);

        $result=$airports['hits'];
        return \Response::json($result);
        
    }


}
