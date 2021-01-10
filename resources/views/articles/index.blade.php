@extends ('layout')

@section ('content')

<div id="wrapper">
	<div id="page" class="container">
    @forelse ($article as $article)
		<div id="content">
			<div class="title">
				<h2>
                    <a href="{{ $article->path() }}">
                    {{ $article->title }}
                </h2>
            </div>

			<p>
                <img src="/images/banner.jpg" alt="" class="image image-full" /> 
            </p>
			{!! $article->excerpt !!}
        </div>
    @empty
        <p>No Articles Found.</p>
    @endforelse
		
	</div>
</div>

@endsection