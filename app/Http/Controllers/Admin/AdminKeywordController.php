<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producer;
use App\Http\Requests\AdminProducerRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $producers = Producer::orderByDesc('id')
            ->paginate(10);
        $viewData = [
            'producers' => $producers,
            'query'      => $request->query()
        ];
        return view('admin.producer.index', $viewData);
    }

}
