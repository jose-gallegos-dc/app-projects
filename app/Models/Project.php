<?php

namespace App\Models;

use App\Traits\UserTracking;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, UserTracking;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'is_active',
        'created_by_user_id',
        'updated_by_user_id'
    ];

    public function createdByUser()
    {
        return User::find($this->created_by_user_id);
    }

    public function updatedByUser()
    {
        return User::find($this->updated_by_user_id);
    }
}
