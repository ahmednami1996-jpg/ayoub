<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subvention extends Model
{
     protected $fillable = [
        'title','city','file_name','organization','url','status','country',
        'views','eligibilities'
        
    ];
public function setUrlAttribute($value)
{
    if (!str_starts_with($value, 'http://') && !str_starts_with($value, 'https://')) {
        $value = 'https://' . ltrim($value, '/');
    }

    $this->attributes['url'] = $value;
}
public function getEligibilitiesArrayAttribute()
{
 if (!$this->eligibilities) return [];

    // Split text by lines, trim each, remove empty lines
    return array_filter(array_map('trim', preg_split("/\r\n|\n|\r/", $this->eligibilities)));
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
