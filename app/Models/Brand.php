<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function cars(): HasMany
    {
        return $this->hasMany(Car::class);
    }
        public function __toString(): string
    {
        return (string) $this->name;
    }
}