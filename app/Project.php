<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded=[];

    public function path()
    {
        return "/project/{$this->id}";
    }

    public function owner()
    {
        return $this->belongsTo("App\User");
    }


}
