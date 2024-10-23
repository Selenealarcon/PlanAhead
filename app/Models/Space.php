<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Space extends Model
{
    use HasFactory;

    /**
    * The users that are assigned to the space
    */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('administrator');
    }

    /**
    * Get all spaces where user belong
    * @param int $userId id of the user
    */
    public static function getSpaces($userId)
    {
        return Space::select('spaces.*')
            ->join('space_user', 'space_user.space_id', '=', 'spaces.id')
            ->where('space_user.user_id', $userId)
            ->withCount('users')
            ->orderBy('spaces.created_at', 'desc')
            ->paginate(9);
    }

    /**
    * Count members of the space
    */
    public function countMembers()
    {
        return $this->users()->count();
    }

    /**
    * Add members to space
    * @param string $emails email of the user
    */
    public function addMembers($emails)
    {
        $users = User::whereIn('email', $emails)->get();

        foreach ($users as $user) {
            $this->user()->attach($user->id);
        }
    }

    /**
    * Get members of the space
    * @param int $spaceId id of the space
    */
    public function getMembersSpace($spaceId)
    {
        return User::join('space_user', 'users.id', '=', 'space_user.user_id')
            ->where('space_user.space_id', $spaceId)
            ->get('users.*');
    }
}
