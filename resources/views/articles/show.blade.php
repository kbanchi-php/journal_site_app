<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>論文詳細</title>
</head>

<body>
    <h1>論文詳細</h1>
    @if ($article !== null)
        <h2>{{ $article->title }}</h2>
        <p>{{ $article->body }}</p>
        <div class="button-group">
            <button onclick="location.href='/articles'">一覧へ戻る</button>
            <button onclick="location.href='/articles/{{ $article->id }}/edit'">編集する</button>
            <form action="/articles/{{ $article->id }}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
            </form>
        </div>
    @else
        <p>id = {{ $id }} の論文情報は存在しません。</p>
    @endif
</body>

</html>
