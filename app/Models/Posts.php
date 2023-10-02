<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'categories_id','title', 'thumb', 'content'
    ];
    public function files(){
        return $this->hasMany(File::class);
    }
    public function categories() {
        return $this->belongsTo(Categories::class);
    }

}
