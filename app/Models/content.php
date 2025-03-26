<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    protected $fillable = ['section_id','content_type','content_title','content',"image"];
    public function section()
    {
        return $this->belongsTo(section::class);
    }
}
