@extends('layouts.app')

@section('content')


@foreach($articles as $article)

<div class="container">
<div class="well-sm">
 <h1><a href="articles/{{$article->id}}" >{{ $article->title}}</a> </h1>
   {{ $article->created_at}}
   <br/>
   <span>author: </span>
      @foreach($article->users as $user)
      {{ $user->name}}
     @endforeach 
</div>

<br/>
<div class="well-sm">
{{ substr($article->content,0,300).'....'}}
 
</div>
<br/>

</div>
@endforeach

@endsection

