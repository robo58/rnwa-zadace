@extends('layouts.app')

@section('content')

    <div class="container">
        <form action="/posts/{{$post->pid}}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" id="pid" name="pid" value="{{$post->pid}}">
            <div class="row">
                <div class="col-25">
                    <label for="rid">Autor</label>
                </div>
                <div class="col-75">
                    <select id="rid" name="rid">
                        <option value="-1" selected disabled>Odaberite autora</option>
                        @foreach($authors as $author)
                            <option value="{{$author->rid}}" {{$author->rid == $post->rid ? 'selected' : ''}}>{{$author->fname}} {{$author->lname}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-25">
                    <label for="pcontent">Sadržaj</label>
                </div>
                <div class="col-75">
                    <textarea id="pcontent" name="pcontent" placeholder="Write something.." style="height:200px">{{$post->pcontent}}</textarea>
                </div>
            </div>
            <br><br>
            <div class="row">
                <br><br>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>

@endsection
