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
    </div>
@endsection
