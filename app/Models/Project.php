<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $fillable = [
        'title','description','resume','status',
        'budget','is_taken','picture','market',
        'busniess_model','investement_type','monthly_growth_p',
        'kpi_users','annual_revenue','retention_rate_p','views'

        
    ];
    public function category(){
        return $this->belongsTo(Project::class);
    }
    public function user(){
        return $this->belongsTo(User::Class);
    }
    public function documents(){
        return $this->hasMany(Document::class);
    }
    public function applicants()
{
    return $this->belongsToMany(User::class, 'applies')
                ->withTimestamps();
}
public function tags()
{
    return $this->belongsToMany(Tag::class, 'project_tag')
                ->withTimestamps();
}
public function applications() {
    return $this->hasMany(Application::class);
}
public function getCreatedTimeAttribute()
{
    return $this->created_at->format('H \h i \m\i\n');
}
 public function getAnnualRevenueFormattedAttribute()
    {
        return $this->formatNumberShort($this->annual_revenue);
    }

    // Budget formatted
    public function getBudgetFormattedAttribute()
    {
        return $this->formatNumberShort($this->budget);
    }

    // Helper method inside model
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
