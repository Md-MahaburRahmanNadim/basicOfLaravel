<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
    @foreach ($posts as $post)
        {{-- @dump($post) --}}
        <p>{{ $post->title }}</p>
        <p>{{ $post->body }}</p>
    @endforeach
    
</body>
</html>