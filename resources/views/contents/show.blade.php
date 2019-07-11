@extends('layouts.app')
@section('title')
    {{ $content->title }}
@endsection

@section('content')

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
        </div>
    </div>

    <div class="container">
        <p>
            <?= $content->html ?>
        </p>
        <hr />
        <h4>SNSでシェア</h4>
        <div class="sns_share">
            <script>
                var url = location.href;
                document.write(
                  '<a href="http://www.facebook.com/share.php?u='+url+'" rel="nofollow" target="_blank" class="fa fa-facebook"></a>' +
                  ' <a href="https://twiter.com/share?url='+url+'" target="_blank" class="fa fa-twitter"></a>'
                );
            </script>

        </div>
    </div>
@endsection
