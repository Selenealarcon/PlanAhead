<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    /**
    * The users that are assigned to the task
    */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
    * relationship rules:
    *	- the space can have many tasks
    * 	- the task belongs to one Space
    */
    public function space(): BelongsTo
    {
        return $this->belongsTo(Space::class);
    }

    /**
     * Retrieve tasks by space ID.
     *
     * @param int $spaceId id of the space.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function tasks($spaceId)
    {
        return static::where('space_id', $spaceId)->get();
    }

    /**
    * The items that are assigned to the task
    */
    public function items()
    {
        return $this->belongsToMany(Item::class);
    }

}
