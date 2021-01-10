@extends('layout')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.0/css/bulma.css"/>
@endsection
@section('content')
    <div id="wrapper">
        <div id="page" class="container">
        <h1 class=""> Create New Article </h1>

        <form method="POST"action="/articles">
            @csrf
            <div id="field">
                <label class="label" for="title"> Title</label>

                <div id="control">
                    <input 
                        class="input @error('title') is-danger @enderror"
                        type="text" 
                        name="title" 
                        id="title"
                        value="{{ old('title') }}"> 
                   
                    @error('title')
                    <p class="help is-danger">{{ $errors->first('title') }}</p>
                    @enderror
                </div>
            </div>

            <div id="field">
                <label class="label" for="excerpt">Excerpt</label>

                <div id="control">
                    <textarea 
                        class="textarea @error('excerpt') is-danger @enderror " 
                        name="excerpt" 
                        id="excerpt"
                        value="{{ old('excerpt') }}" >
                    </textarea>

                    @error('excerpt')
                    <p class="help is-danger">{{ $errors->first('excerpt') }}</p>
                    @enderror
                </div>
            </div>

            <div id="field">
                <label class="label" for="body">Body</label>

                <div id="control">
                    <textarea 
                        class="textarea @error('body') is-danger @enderror" 
                        name="body" 
                        id="body" 
                        value="{{ old('body') }}">
                    </textarea>

                    @error('body')
                    <p class="help is-danger">{{ $errors->first('body') }}</p>
                    @enderror
                </div>
            </div>

            <div id="field">
                <label class="label" for="tags">Tags</label>

                <div id="select is-multiple control">
                    <select name="tags[]"
                    multiple id="">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id}}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                    @error('tags')
                    <p class="help is-danger">{{ $message }}</p>
                    @enderror
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