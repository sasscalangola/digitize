<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grids extends Model
{
    //
    protected $table = 'grid';
    public $incrementing = false;

    public function users_digitized (){
        return $this->belongsToMany('App\User','users_grid','grid_id','user_id')->withPivot('project_id','user_ip','image_source','image_date_min','image_date_max','num_houses','bad_quality','zoom')->withTimestamps();
    }

    public function projects (){
        return $this->belongsToMany('App\Projects','grid_project','grid_id','project_id')->withTimestamps();
    }
}
