<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequestArticle;
use App\Models\Article;
use App\Models\Menu;
class AdminArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('menu:id,mn_name')->paginate(10);
        $viewData = [
            'articles' => $articles
        ];

        return view('admin.article.index', $viewData);
    }

    public function create()
    {
        $menus = Menu::all();

        return view('admin.article.create',compact('menus'));
    }

    public function store(AdminRequestArticle $request)
    {
        $data = $request->except('_token','a_avatar','a_position_1','a_position_2');
        $data['a_slug']     = Str::slug($request->a_name);
        $data['created_at']   = Carbon::now();

        if ($request->a_position_1) {
            $data['a_position_1'] = 1;
        }

        if ($request->a_position_2) {
            $data['a_position_2'] = 1;
        }
        
        if ($request->a_avatar) {
            $image = upload_image('a_avatar');
            if ($image['code'] == 1) 
                $data['a_avatar'] = $image['name'];
        } 

        $id = Article::insertGetId($data);
    
        return redirect()->back();
    }

}
