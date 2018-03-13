<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function tasks() {
        return $this->hasMany(Task::class);
    }

    public function users(){
    	return $this->hasMany(User::class);
    }
}
