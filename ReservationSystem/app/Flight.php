<?php

namespace App;


class Flight extends Model
{
    

    public function users(){

        return $this->belongsToMany(User::class);
            }

    public function airlines(){

        return $this->belongsToMany(Airline::class);
           }
}
