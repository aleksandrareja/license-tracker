<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class License extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'key',
        'max_users',
        'expiration_date',
        'status',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function countCurrentUsers()
    {
        return $this->users()->count();
    }

}

