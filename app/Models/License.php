<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

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

    // Relations 

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    //Users logic

    public function countCurrentUsers(): int
    {
        return $this->users()->count();
    }

   // License status logic

    public function isExpired(): bool
    {
        return $this->expiration_date !== null
            && now()->greaterThan($this->expiration_date);
    }

    // Get effective status considering expiration

    public function getEffectiveStatusAttribute(): string
    {
        if ($this->status === 'suspended') {
            return 'suspended';
        }

        if ($this->isExpired()) {
            return 'expired';
        }

        return 'active';
    }

    public function daysUntilExpiration(): string
    {
        if (!$this->expiration_date) {
            return 'N/A';
        }

        if ($this->isExpired()) {
            return 'Expired';
        }

        $hoursLeft = now()->diffInHours($this->expiration_date);
        $daysLeft = (int) ceil($hoursLeft / 24);

        return $daysLeft . ' days';
    }

    public function expiresSoon(int $days = 14): bool
    {
        if (!$this->expiration_date || $this->isExpired()) {
            return false;
        }

        return now()->diffInDays($this->expiration_date) <= $days;
    }


    // Statistics

    public static function activeLicensesCount(): int
    {
        return self::where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('expiration_date')
                  ->orWhere('expiration_date', '>', now());
            })
            ->count();
    }


    public static function totalRevenue(): float
    {
        return self::where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('expiration_date')
                  ->orWhere('expiration_date', '>', now());
            })
            ->sum('price');
    }
}
