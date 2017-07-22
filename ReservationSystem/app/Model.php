<?php

namespace App;
use Illuminate\Database\Eloquent\Model as Eloquent;
use AlgoliaSearch\Laravel\AlgoliaEloquentTrait as Algolia;
class Model extends Eloquent
{
protected $guarded = array();

public $timestamps = false;


}
