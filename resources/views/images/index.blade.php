@extends('layouts.app')

@section('content')
    <form action="upload" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="file" />
        <input type="submit" value="登録">
    </form>
    @foreach ($images as $image)
        <img src="{{ asset('storage/' . $image->path) }}">
        <p>{{ asset('storage/' . $image->path) }}</p>
    @endforeach
@endsection
<style>
    img{
        width:400px;
    }
</style>
