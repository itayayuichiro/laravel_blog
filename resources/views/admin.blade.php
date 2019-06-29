@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/admin">
    日付範囲選択：<input type="date" name="start_date">~<input type="date" name="end_date">
    <input type="submit" name="">      
    </form>
    <table class="table">
        <thead class="table-dark">          
            <tr>
                <th>パス</th>
                <th>ステータスコード</th>
                <th>平均処理時間</th>
                <th>アクセス回数</th>
                <th>集計日時</th>
            </tr>
        </thead>
        <tbody>             
    <?php 
        foreach ($logs as $key => $value) {
            ?>
            <tr>
                <td><?php echo $value->path; ?></td>
                <td><?php echo $value->status_code; ?></td>
                <td><?php echo $value->time; ?></td>
                <td><?php echo $value->cnt; ?></td>
                <td><?php echo $value->summary_date; ?></td>
            </tr>

            <?php
        }
    ?>
        </tbody>
    </table>
</div>
@endsection
