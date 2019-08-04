@extends('layouts.hobby')
@section('title'){{ $content->title }}@endsection
@section('url'){{ $url }}@endsection

@section('content')
    <div class="bg-header" style="background-image: url('{{ $content->bg_image }}')">
        <div class="header_bg">
            <div class="head_title">
                {{ $content->title }}
            </div>
        </div>
    </div>
    <div class="article">
        <div class="min_title">
            <div class="container">
                <h1 style="margin-top: 0px;padding-top: 10px;">
                    {{ $content->title }}
                </h1>
                <span>
                    @foreach ($tags as $tag)
                        <a href="#">#{{ $tag->name }}</a>
                    @endforeach
                </span>
                <p>
                    <?= $content->html ?>
                </p>
                <hr />
                <h4>SNSでシェア</h4>
                <div class="sns_share">
                    <a href="http://www.facebook.com/share.php?u=<?= $url ?>" rel="nofollow" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/share?url=<?= $url ?>&text=<?= $content->title ?>" target="_blank" class="fa fa-twitter"></a>
                </div>

            </div>
        </div>
    </div>

@endsection
