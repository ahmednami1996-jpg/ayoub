<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
     protected $fillable = [
        'title','provider','url','status',"mode","cost","like","picture","reduction",
        "duration","views","category_id"
        
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function setUrlAttribute($value)
{
    if (!str_starts_with($value, 'http://') && !str_starts_with($value, 'https://')) {
        $value = 'https://' . ltrim($value, '/');
    }

    $this->attributes['url'] = $value;
}
    public function getCreatedTimeAttribute()
{
    return $this->created_at->format('H \h i \m\i\n');
}
public function getViewsAttribute(){
   return $this->formatNumberShort($this->attributes['views']);
}
 private function formatNumberShort($number)
    {
        if ($number >= 1000000000) {
            return round($number / 1000000000, 1) . 'B';
        } elseif ($number >= 1000000) {
            return round($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000) {
            return round($number / 1000, 1) . 'K';
        }

        return $number;
    }
}
