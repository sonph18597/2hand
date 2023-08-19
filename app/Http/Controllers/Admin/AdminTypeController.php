<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Category;
use App\Http\Requests\AdminTypeRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
class AdminTypeController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $types = Type::orderByDesc('id')->paginate(10);
        $viewData = [
            'types' => $types,
            'query'      => $request->query()
        ];
        return view('admin.type.index', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.type.create', compact('categories'));
    }

    public function store(AdminTypeRequest $request)
    {
        //
        $data = $request->except('_token');
        $data['t_slug']   = Str::slug($request->t_name);
        $data['created_at'] = Carbon::now();

        Type::insertGetId($data);
        return redirect()->back();
    }

}
