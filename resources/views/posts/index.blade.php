<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>All comments for post: <b>{{ $post }}</b></h3>
    <ul>
        @forelse ($comments as $comment)
        <li>
            {{ $comment->content }}
            <form action="{{ route('posts.comments.destroy', ['post' => $post, 'comment' => $comment->id]) }}" method="post">   
                @method('delete')
                @csrf
                <input type="submit" value="remove">
            </form>    
        </li>
        @empty
        <h3>There are no comments for this post</h3>
        @endforelse
    </ul>
    <a href="{{ route('posts.comments.create', ['post' => $post]) }}">Create new comment</a>
</body>
</html>
