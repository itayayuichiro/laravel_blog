@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="profile_box">
            <div class="profile inline">
                <img class="inline profile_img" src="{{ asset('/img/human.png') }}">
                <div class="panel-heading">{{$user->name}}さんのページ</div>
            </div>
            <div class="post_report inline">
                <div class="search_form">人気のあるレポート</div>
                <div class="report_list">
                    @foreach ($contents as $content)
                        <div class="report inline">
                            <div class="title">
                                <a href="{{route('contents.show',$content->id)}}">
                                    {{ $content->title }}
                                </a>
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
            </div>
        </div>

    </div>
@endsection
