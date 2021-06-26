<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>タイトル</title>
    </head>
    <body>
        <label>【{{ $quizu_index }}問目】</label>
        <br>
        <label>問題ー{{ $mondai }}</label>
        <br>
        <label>答えー{{ $answer }}</label>
        <br>
        {!! link_to_route('top', '次の問題', ['next_pos' => $next_pos], []) !!}
    </body>
</html>