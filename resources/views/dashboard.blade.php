@extends('layout')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div id="content">
        <a href="articles/create" class="btn btn-primary">Create Post</a>
        <h3>My blog Posts</h3>
                <ul class="style1">
                    @if(count($articles) > 0)
                        @foreach ($articles as $article)
                            <li class="first">
                                <h3>
                                    <a href="/articles/{{ $article->id}}">{{ $article->title }}</a>
                                </h3>
                                <p><a href="/articles/{{ $article->id}}">{{ $article->excerpt }}</a></p>
                            </li>
                        @endforeach
                    @else
                        <p>You have no Posts</p>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
