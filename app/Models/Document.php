<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
     protected $fillable = [
        'file_name'
        ,'project_id'
    ];


    public function project(){
        return $this->belongsTo(Project::class);
    }
}