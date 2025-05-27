<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>

    {{-- {{dd($articles)}}; --}}

    <ul>
    @foreach ($articles as $article)
        <li>{{$article['id']}} {{$article['name']}}</li>
    @endforeach
    </ul>
</body>
</html>