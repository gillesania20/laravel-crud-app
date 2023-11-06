<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @auth
        <div>
            <p>You are logged-in</p>
            <form action="/logout" method="POST">
                @csrf
                <button>Log out</button>
            </form>
        </div>
        <hr>
        <div>
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" name="title" placeholder="Post title">
                <textarea name="body" placeholder="Body content..."></textarea>
                <button>Save post</button>
            </form>
        </div>
        <hr>
        <div>
            <h2>All Posts</h2>
            @foreach($posts as $post)
            <div>
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                <p>{{$post['body']}}</p>
                <div>
                    <a href="/edit-post/{{$post->id}}">Edit</a>
                </div>
                <div>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div>
            <h2>Register</h2>
            <form action="/register" method="POST">
                @csrf
                <input type="text" name="name" placeholder="name">
                <input type="text" name="email" placeholder="email">
                <input type="password" name="password" placeholder="password">
                <button>Register</button>
            </form>
        </div>
        <hr>
        <div>
            <h2>Login</h2>
            <form action="/login" method="POST">
                @csrf
                <input type="text" name="login_name" placeholder="name">
                <input type="password" name="login_password" placeholder="password">
                <button>Login</button>
            </form>
        </div>
    @endauth
</body>
</html>