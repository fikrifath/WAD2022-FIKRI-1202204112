<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Showroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'name', 
        'owner', 
        'brand', 
        'purchase_date', 
        'description', 
        'foto', 
        'status',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
