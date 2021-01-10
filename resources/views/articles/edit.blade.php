@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css"/>
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
        <h1 class=""> Update Article </h1>

        <form method="POST"action="/articles/{{ $article->id }}">
            @csrf
            @method('PUT')
            <div id="field">
                <label class="label" for="title"> Title</label>

                <div id="control">
                    <input class="input" type="text" name="title" id="title" value="{{$article->title}}"> 
                </div>
            </div>

            <div id="field">
                <label class="label" for="excerpt">Excerpt</label>

                <div id="control">
                    <textarea class="textarea" name="excerpt" id="excerpt" >{{ $article->excerpt }}</textarea>
                </div>
            </div>

            <div id="field">
                <label class="label" for="body">Body</label>

                <div id="control">
                    <textarea class="textarea" name="body" id="body" >{{ $article->body }}</textarea>
                </div>
            </div>

            <div class="field is-grouped">
              <div class="control">
                <button class="button is-link" type="submit">
                  Submit
                </button>
              </div>
              
            </div>
        
        </form>
        </div>
    </div>


@endsection