<?php

namespace App\Http\Controllers;

use App\Flight;
use App\User;
use App\Airline;
use Illuminate\Http\Request;

class UserController extends Controller
{

   public function login()
  {
    return \App::make('auth0')->login();
  }



  public function logout()
  {
  \Auth::logout();
    return  \Redirect('/loogedOut');
  }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
        return \Response::json($user);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
     {
        

        $user= User::create([
        'name'=>$request['name'],
        'city_id'=> $request['city_id'],
        'email'=>$request['email'],
        'password'=> bcrypt(Request('password'))

           ]);

       // dd($airport);
        return \Response::json($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reserve(Request $request)
    {
       
     $user=User::find($request['user_id']);
     $flight=Flight::find($request['flight_id']);
     $user->flights()->attach($flight,array(
    "id"=>$request["id"],
    "airline_id" =>$request["airline_id"],
    "status"=>$request["status"],
    "flight_price"=>$request["flight_price"]
      ));
  

       
        return \Response::json($user->flights()->withPivot('airline_id','status','flight_price')->get());
    }

    public function cancel(Request $request, Flight $flight){

      $user=User::find($request['user_id']);

      $flight=Flight::find($flight->id); 
       $user->flights()->updateExistingPivot($flight->id,array('status' => 'deleted'));
        return \Response::json($user->flights()->withPivot('airline_id','status','flight_price')->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user =User::find($user->id);

        return \Response::json($user);
            }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        User::find($user->id)->update([
        'name'=>$request['name'],
        'city_id'=> $request['city_id'],
        'email'=>$request['email'],
        'password'=> bcrypt(Request('password'))
        ]);
     $user=User::find($user->id);
    return \Response::json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
            User::find($user->id)->delete();

            }
}
