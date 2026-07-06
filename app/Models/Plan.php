<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'price', 'velocity_download', 'description', 'user_id'])]
class Plan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function signatures()
    {
        return $this->hasMany(Signature::class);
    }
}
