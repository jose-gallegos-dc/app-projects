<?php

namespace App\Traits;

trait UserTracking
{
    public static function bootUserTracking()
    {
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->created_by_user_id = auth()->user()->id;
            }
        });

        static::updating(function ($model) {
            if (auth()->check()) {
                $model->updated_by_user_id = auth()->user()->id;
            }
        });
    }
}
