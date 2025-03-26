<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable=["section","img_path"];
    public function content()
    {
        return $this->hasMany(content::class,"section_id","id");
        
    }
}
