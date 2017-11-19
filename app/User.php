<?php

namespace App;

use App\NewsEventsArticle;

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
    /**
     * Get all of the news and events for the user.
     */
    public function newsevents()
    {
        return $this->hasMany(NewsEventsArticle::class);
    }
}
