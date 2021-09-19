<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新規論文投稿</title>
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
    <h1>新規論文投稿</h1>
    <form action="/articles" method="post">
        @csrf
        <p>
            <label for="name">論文タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </p>
        <p>
            <label for="body">本文</label>
            <textarea name="body" cols="30" rows="10" required>{{ old('body') }}</textarea>
        </p>
        <input type="submit" value="投稿">
    </form>
</body>

</html>
