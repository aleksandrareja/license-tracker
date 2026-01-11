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

    public function daysUntilExpiration()
    {
        if (!$this->expiration_date) {
            return 'N/A';
        }

        $now = now();
        $expiration = $this->expiration_date;

        if ($now->greaterThan($expiration)) {
            return 'Wygasła';
        }

        $daysLeft = $now->diffInDays($expiration);
        if ($daysLeft<1) {
            return '0 dni';
        }

        return $now->diffInDays($expiration) . ' dni';
    }

}

