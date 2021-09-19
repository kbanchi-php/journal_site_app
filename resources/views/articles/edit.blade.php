<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿論文編集</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>投稿論文編集</h1>
    @if ($article !== null)
        <form action="/articles/{{ $article->id }}" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{ $article->id }}">
            <p>
                <label for="name">論文タイトル</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" required>
            </p>
            <p>
                <label for="body">本文</label>
                <textarea name="body" cols="30" rows="10" required>{{ old('body', $article->body) }}</textarea>
            </p>
            <input type="submit" value="更新">
        </form>
    @else
        <p>id = {{ $id }} の論文情報は存在しません。</p>
    @endif
</body>

</html>
