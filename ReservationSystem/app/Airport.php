<?php

namespace App;

use AlgoliaSearch\Laravel\AlgoliaEloquentTrait;
class Airport extends Model
{
    use AlgoliaEloquentTrait;
   
    public static $autoIndex=true;
    public static $autoDelete=true;
// public $algoliaSettings = [
//         'searchableAttributes' => [
//             'id',
//             'name',
//         ] , 'customRanking' => [
//             //'desc(popularity)',
//             'asc(name)',
//         ],
//         ];
   

//Airport::reindex();

//Airport::setSettings();
    //     public function getAlgoliaRecord()
    // {
    //     return array_merge($this->toArray(), [
    //         'name' => 'Airport Name'
    //     ]);
    // }


 
}
