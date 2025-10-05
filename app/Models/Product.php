<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','slug','description','price_cents','stock','images'];
    protected $casts = ['images' => 'array'];
    public function getPriceAttribute(){ return $this->price_cents / 100; }
    public function scopeSearch($q,$s){ return $s? $q->where('name','like',"%$s%") : $q; }
    public function categories(){ return $this->belongsToMany(\App\Models\Category::class); }

}
