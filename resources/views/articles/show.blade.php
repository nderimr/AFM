@extends('layouts.app')

@section('content')

<div class="container">
<div class="well-sm">
 <h1>{{ $article->title}} </h1>
   {{ $article->created_at}}
   <br/>
   <span>author: </span>
      @foreach($article->users as $user)
          {{ $user->name}}
      @endforeach
</div>

  <br/>
  <div class="well-sm">
   {{ $article->content}}
 
</div>
<br/>
  <div >
  @foreach($article->comments as $comment)
   
   {{$comment->user->name}} <span>at</span> {{$comment->created_at}} <span>  wrote: </span>
   <br/>
   
   {{$comment->content}} 
     <br/>
      <br/> 
      @endforeach
 </div>
<br/>
<span>TAGS: </span>
  @foreach ($article->tags as $tag)
     {{$tag->name}}
  @endforeach
</div>

@endsection

