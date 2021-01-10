@extends ('layout')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{ $article->title }}</h2>
            </div>
            @auth
                @if(Auth::user()->id == $article->user_id)
                    <div class="row">
                        <div class="col-md-8">
                            <a href="/articles/{{$article->id}}/edit" class="btn btn-outline-primary">Edit Post</a>
                        </div>
                        <div class="col-md-4">
                            <a href="" class="btn btn-danger">Delete Post</a>
                        </div>
                    </div>
                @endif
            @endauth
            <br>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			{{ $article->body}}

			<p style="margin-top: 1em">
				@foreach ($article->tags as $tag)
					<a href="{{ route('articles.index', ['tag' => $tag->name]) }}">{{ $tag->name }} </a>
				@endforeach
			</p>
		</div>

	</div>
</div>

@endsection
