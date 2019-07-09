<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Contents;

class ContentsController extends Controller
{
    /**
     * トップページ
     */
    public function index(){
        $contents = Contents::paginate(10);
        return view('contents.index', [
            'contents' => $contents
        ]);
    }
    /**
     * 記事ページ
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Contents::findRecord($id);

        return view('contents.show', [
            'content' => $content
        ]);
    }

    /**
     * 検索画面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $contents = Contents::where('title', 'LIKE', "%" . $request->keyword . "%")->orWhere('html', 'LIKE', "%" . $request->keyword . "%")
            ->paginate(10);
        return view('contents.index', compact('contents'));
    }
}
