<?php

namespace App\Http\Controllers;

use App\Models\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(string $name = 'TIN')
    {
        return $name;
    }
    //
    public function getAll()
    {
        $hello =  News::all();
        return $hello;
    }
    public function findOne($id, $status)
    {
        $hello =  News::where('id', '=', $id, 'and', 'status', '=', $status)->get();
        return $hello;
       
    }
}
