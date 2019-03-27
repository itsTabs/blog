<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //Table Name
    protected $table = 'contact';
    //Primary Key
    public $primaryKey = 'id';
    //TimeStamps
    public $timestamps = true; 
    public function user(){
        return $this->belongsTo('App\User');
    }
}
