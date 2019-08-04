<?php

namespace App\Http\Controllers;

use App\Tag;
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
        $tags = Tag::where('content_id', $id)->get();
        $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if ($content->category_id === 1) {
            return view('contents.show', [
                'content' => $content,
                'url' => $url,
                'tags' => $tags
            ]);
        } else {
            return view('contents.anime', [
                'content' => $content,
                'url' => $url,
                'tags' => $tags
            ]);
        }
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
