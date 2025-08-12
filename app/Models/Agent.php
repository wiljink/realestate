<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $fillable = ['user_id', 'license_no', 'team'];

    // Relationships or other logic here, e.g.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
