<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = ['id_applicant','id_job','status'];

    public function Applicant(){
        return $this->hasOne('App\Seeker','id','id_applicant');
    }

    public function Job(){
        return $this->hasOne('App\Jobs','id','id_job');
    }

}
