<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fault extends Model
{
    use HasFactory;
    
    protected $table = "faults";
    public function role_user()
    {
        return $this->belongsTo(Role::class);
    }


}
