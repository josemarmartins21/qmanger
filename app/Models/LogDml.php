<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['operation', 'table', 'new_data', 'old_data', 'user_name', 'user_id', 'instace_id'])]
class LogDml extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
