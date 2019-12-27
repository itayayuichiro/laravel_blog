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
        $content_tags = Tag::where('content_id', $id)->get();
        // 関連記事(同じタグの)を取得
        
        // 同じタグの記事IDを取得
        $tag_query = null;
        foreach ($content_tags as $key => $content_tag) {
          if($key === 0){
            $tag_query = Tag::where('name', 'LIKE',"%" . $content_tag->name . "%");
          }else{
            $tag_query = $tag_query->orWhere('name', 'LIKE',"%" . $content_tag->name . "%");
          }
        }
        $relation_contents = [];
        if($tag_query !== null){
          $tags = $tag_query->get();
          $content_ids = [];
          foreach ($tags as &$tag) {
            if($tag->content_id !== $content->id){
              array_push($content_ids,$tag->content_id);
            }
          }
          $relation_contents = Contents::whereIn('id', $content_ids)->paginate(3);
        }
        $url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        if ($content->category_id === 1) {
            return view('contents.show', [
                'content' => $content,
                'url' => $url,
                'tags' => $content_tags,
                'relation_contents' => $relation_contents
            ]);
        } else {
            return view('contents.anime', [
                'content' => $content,
                'url' => $url,
                'tags' => $content_tags
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
      // タグ検索
      if(!empty($request->tag)){
        $tag_records = Tag::where('name','LIKE',$request->tag)->select('content_id')->get();
        $content_ids = [];
        foreach ($tag_records as &$record) {
          array_push($content_ids,$record->content_id);
        }
        $contents = Contents::whereIn('id', $content_ids)->paginate(10);
      }else{
        $contents = Contents::where('title', 'LIKE', "%" . $request->keyword . "%")->orWhere('html', 'LIKE', "%" . $request->keyword . "%")
        ->paginate(10);
      }
      return view('contents.index', compact('contents'));
    }
}
