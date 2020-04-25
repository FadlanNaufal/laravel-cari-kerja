<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    protected $fillable = ['id_employeer','id_admin','id_category','name','desc','position','salary','place','open_at','close_at'];

    public function Admin(){
        return $this->hasOne('App\User','id','id_admin');
    }

    public function Employeer(){
        return $this->hasOne('App\Employeer','id','id_employeer');
    }

    public function Category(){
        return $this->hasOne('App\Category','id','id_category');
    }

}
