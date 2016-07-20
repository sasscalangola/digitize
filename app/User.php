<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function households(){

        return $this->hasMany('App\Households');
    }
    public function grids_digitized(){
        //REVER ISTO-> Foreing Key, Local Key...

        return $this->belongsToMany('App\Grids','grid_digitize','user_id','grid_id')->withPivot('project_id','user_ip','image_source','image_date_min','image_date_max','num_houses','bad_quality','zoom')->withTimestamps();
    }

    public function projects (){
        return $this->belongsToMany('App\Projects','project_user','user_id','project_id')->withPivot('level_id')->withTimestamps();
    }
}
