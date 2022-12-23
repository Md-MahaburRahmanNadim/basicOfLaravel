<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
    {{-- like foreach loop --}}
    {{-- @forelse ($posts as $post)
        <p>{{ $post->title }}</p>
    @empty
        <p>post is not found</p>
    @endforelse --}}
    @if (count($posts) >100){
        <h1>We have more than 100 posts</h1>
    }
    @elseif(count($post)<100)
        <h1>We have lass then 100 hundrad post</h1>
    
        
    @else
        <h1>no post</h1>
    @endif
    {{-- reverse then the if  --}}
    @unless ($posts)
        <h1>post has been added</h1>
        
    @endunless

    {{-- some hidden property in the foreach or forelse loop--}}
    @forelse ($posts as $post)
        {{-- @dump($loop) this will show you all of the hidden property in you loop object --}}
        {{-- {{ $loop->first }} it's give us the bool output --}}
        {{-- {{ $loop->last}} it's also give us the bool output --}}
    @empty
        
    @endforelse
    
</body>
</html>