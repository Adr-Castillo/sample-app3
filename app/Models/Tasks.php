<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    //This will be used to manage the tasks table.
    protected $fillable = ['task', 'name'];
}
