<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Port;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PortsController extends Controller
{
    public function index(){
        $list = Port::all();
        return Inertia::render('Public/Port/Index',compact('list'));
    }
    public function search($text){
        $list = Port::where('name','like','%'.$text.'%')->get();
        return Inertia::render('public/Port/Index',compact('list'));
    }
    public function img($name){
        try {
            $path = "app/port/$name";
            return response()->file(storage_path($path));
        } catch (\Throwable $th) {
            return "error";
        }

    }
}
