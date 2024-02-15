<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Create a new comment for post : {{$post->title}}</h2>
    <form action="{{route('posts.comments.store', ['post' => $post->id])}}" method="POST">
        @csrf 
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <label for="content">Comment:</label><br>
        <textarea id="content" name="content" rows="4" cols="50"></textarea><br>

        <button type="submit">Submit</button>
    </form>
    
</body>
</html>
