<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    
        public function flights(){

            return $this->belongsToMany(Flight::class);
          }


}
