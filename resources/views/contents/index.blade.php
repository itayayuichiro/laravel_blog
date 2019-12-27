@extends('layouts.app')

@section('content')
    <div class="min_title">
        <div class="container">
            <h1 class="inline">
                <? if (!empty($_GET['keyword'])){ ?>
                「<?= $_GET['keyword'] ?>」の検索結果
                <? }elseif (!empty($_GET['tag'])) { ?>
                  「#<?= $_GET['tag'] ?>」の検索結果
                <? }else{ ?>
                  TOPページ
                <? } ?>
                <span><img class="inline" src="{{ asset('/img/report.png') }}"></span>
            </h1>
        </div>
    </div>
    <div class="container">
        <br>
        <div class="report_list">
            @foreach ($contents as $content)
                <div class="report">
                    <div class="title">
                        <h3>
                            <a href="{{route('contents.show',$content->id)}}">
                                {{ $content->title }}
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $contents->links() }}
    </div>
@endsection
