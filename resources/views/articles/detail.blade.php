@extends("layouts.app")

@section("content")
    <div class="container">

        <div class="card mb-2">
            <div class="card-body">
                <h4 class="card-title">{{ $article->title }}</h4>
                <small class="text-muted">
                    <b class="text-success">
                        {{ $article->user->name }}
                    </b>,
                    <b>Category:</b>
                    <span class="text-success">
                        {{ $article->category->name }}
                    </span>
                    {{ $article->created_at->diffForHumans() }}
                </small>
                <div class="mb-2">{{ $article->body }}</div>
                @auth
                    @can('delete-article', $article)
                        <a href="{{ url("/articles/delete/$article->id") }}" class="btn btn-sm btn-outline-danger">Delete</a>
                    @endcan
                @endauth
            </div>
        </div>


        <ul class="list-group mt-4">
            <li class="list-group-item active">
                Comments ({{ count($article->comments)}})
            </li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    @can('delete-comment', $comment)
                        <a href="{{ url("/comments/delete/$comment->id") }}" class="btn-close float-end"></a>
                    @endcan

                    <b class="text-success">
                        {{ $comment->user->name }}
                    </b> -
                    {{ $comment->content }}
                </li>
            @endforeach
        </ul>

        @auth
            <form action="{{ url("comments/add") }}" method="post">
                @csrf
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <textarea name="content" class="form-control my-2"></textarea>
                <button class="btn btn-secondary">Add Comment</button>
            </form>
        @endauth

    </div>
@endsection
