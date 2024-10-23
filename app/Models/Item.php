<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
    * The tasks that are assigned to the item ???????
    */
    public function tasks()
    {
        return $this->belongsToMany(Task::class);
    }
}
