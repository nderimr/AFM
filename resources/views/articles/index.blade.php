@extends('layouts.app')

@section('content')


@foreach($articles as $article)
<div>
<div class="well-sm">
 
<h1> {{ $article->title}} </h1>
    {{ $article->created_at}}
</div>

</div>
<br/>
<div class="well-sm">
{{ $article->content}}
</div>
<br/>


<br/>
<br/>
<br/>
@endforeach

@endsection

