@extends('layouts.app')

@section('content')
    <div class="min_title">
        <div class="container">
            <h1 class="inline">
                <? if (!empty($_GET['keyword'])){ ?>
                「<?= $_GET['keyword'] ?>」
                <? } ?>
                レポート一覧
                <span><img class="inline" src="{{ asset('/img/report.png') }}"></span>
            </h1>
        </div>
    </div>
    <div class="container">
        <form class="search_form" action="{{ action('ContentsController@search') }}" method="GET">
            <input type="text" class="search_box" name="keyword" placeholder="大学名、授業名、タイトル"
                   value="<? if (!empty($_GET['keyword'])) {
                       echo $_GET['keyword'];
                   } ?>">
        </form>
        <br>
        <div class="report_list">
            @foreach ($contents as $content)
                <div class="report">
                    <div class="title">
                        <h3>
                            <a href="{{route('contents.show',$content->id)}}">
                                <img src="{{ asset('/img/'.\File::extension($content->file_path).'.png') }}">
                            </a>
                            <a href="{{route('contents.show',$content->id)}}">
                                {{ $content->title }}
                            </a>
                        </h3>
                    </div>
                    <div class="sub_title">
                        <p class="text-gray">
                            {{ $content->class_name }}
                        </p>
                    </div>
                    <div class="info">
                        <div class="post_user inline">
                            <img src="{{ asset('/img/human.png') }}">
                            <a href="{{action('ContentsController@profile',$content->user_id)}}">{{ $content->name }}</a>
                        </div>
                        <div class="post_user inline">
                            <img src="{{ asset('/img/download.png') }}">
                            {{ $content->download_num }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{$contents->appends(Request::only('keyword'))->links()}}
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- 初めての広告 -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-1646080327489742"
             data-ad-slot="5357510291"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
          (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
@endsection
