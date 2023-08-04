<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequestKeyword;
use App\Models\Keyword;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminKeywordController extends Controller
{
    public function index()
    {
        $keywords = Keyword::paginate(10);

        $viewData = [
            'keywords' => $keywords
        ];

        return view('admin.keyword.index', $viewData);
    }
    public function create()
    {
        return view('admin.keyword.create');
    }

    public function store(AdminRequestKeyword $request)
    {
        $data               = $request->except('_token');
        $data['k_slug']     = Str::slug($request->k_name);
        $data['created_at'] = Carbon::now();

        $id = Keyword::insertGetId($data);

        return redirect()->back();
    }

}
