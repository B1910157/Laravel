<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'table_hello';
    // protected $timestamps = true;
    protected $fillable = ['name', 'email', 'phone', 'status'];
    // public function test(string $name)
    // {

    //    return $name;
    // }
}
