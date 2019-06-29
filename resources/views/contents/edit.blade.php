@extends('layouts.app')

@section('content')

    <div class="create_form_container">
        <h1 class="inline">
            レポート情報編集
            <span><img class="inline" src="{{ asset('/img/report.png') }}"></span>
            <div class="subscript">一度振り返って見るのもまた一興</div>
        </h1>
        <div class="panel-body">
            @if ($errors->any())
                <h2>エラーメッセージ</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form action="{{route('contents.update',$content->id)}}" method="POST"
                  enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="inline">
                    <label>大学名</label><br>
                    <input type="text" class="input_template readonly" name="college_name" value="専修大学" readonly>
                </div>
                /
                <div class="inline">
                    <label>授業名</label><br>
                    <input type="text" class="input_template" name="class_name" value="{{$content->class_name}}">
                </div>
                /
                <div class="inline">
                    <label>レポートタイトル</label><br>
                    <input type="text" class="input_template" name="title" value="{{$content->title}}">
                </div>
                <br>
                <div class="comment">
                    <label>コメント<span class="subscript">(オプション)</span></label>
                    <input class="input_template_max" name="comment" value="{{$content->comment}}">
                </div>
                <label>レポート</label>
                <br>
                <input type="file" class="form-control" name="file">
                <br>
                <input type="submit" class="submit" value="編集">
            </form>
        </div>
    </div>
@endsection
