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

         // policz pełne dni w górę
        $hoursLeft = $now->diffInHours($expiration);
        $daysLeft = (int) ceil($hoursLeft / 24);

        return $daysLeft . ' dni';
    }

    public static function activeLicensesCount()
    {
        return self::where('status', 'active')->count();
    }

    public function ifExpiresSoon()
    {
        if (!$this->expiration_date) {
            return false;
        }

        $now = now();
        $expiration = $this->expiration_date;

        if ($now->greaterThan($expiration)) {
            return false;
        }

        $daysLeft = $now->diffInDays($expiration);
        return $daysLeft <= 14;
    }

    public static function totalRevenue()
    {
        return self::where('status', 'active')->sum('price');
    }

}

