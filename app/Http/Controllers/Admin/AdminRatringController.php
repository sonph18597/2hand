<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminRatringController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('product:id,pro_name,pro_slug','user:id,name')
        ->orderByDesc('id')
        ->paginate(10);

        return view('admin.rating.index',compact('ratings'));
    }
    public function delete($id)
    {
        
    }
}
