@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$user['name']}}さんのマイページ</div>

                    <div class="panel-body">
                        <span>投稿したレポート</span>
                        <table class="table">
                            <tr>
                                <th>ファイル形式</th>
                                <th>大学名</th>
                                <th>タイトル</th>
                                <th>機能</th>
                            </tr>
                            @foreach ($contents as $content)
                                <tr>
                                    <td><a href="{{route('contents.show',$content->id)}}"><img src="./img/pdf.png"></a>
                                    </td>
                                    <td>{{ $content->college_name }}</td>
                                    <td>{{ $content->title }}</td>
                                    <td>
                                        <a href="{{route('contents.edit',$content->id)}}" class="btn btn-success">編集</a>
                                        <form action="{{route('contents.destroy',$content->id)}}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-danger" value="削除">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
