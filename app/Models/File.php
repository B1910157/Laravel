<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    // protected $table = 'files_post';
    protected $table = 'files';
    protected $fillable = [
        'post_id','filename'
    ];
    public function post(){
        return $this->belongsTo(Posts::class);
    }
}
