@extends('layouts.app')
@section('title')
    {{ $content->title }}
@endsection

@section('content')

    <div class="min_title">
        <div class="container">
            <h1 class="inline">
                {{ $content->title }}
            </h1>
        </div>
    </div>

    <div class="container">
        <p>
            <?= $content->html ?>
        </p>
    </div>
@endsection
