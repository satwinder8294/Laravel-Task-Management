<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    /**
     * Get the project record associated with the task.
     */
    public function project()
    {
        return $this->hasOne('App\Project');
    }
}
