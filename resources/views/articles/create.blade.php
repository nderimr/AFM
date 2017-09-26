@extends('layouts.app')

@section('content')
<div class="container">

<div class="well-sm">
 <!-- {!! Form::model([$article=new \App\Article,['action'=>'ArticlesController']]) !!}
    -->
  
   {!! Form::model($article=new \App\Article,['url'=>'articles','files' => true] ) !!} 
   
      <div class="form-group">
      {!! Form::label('title', 'Title:')!!}
      {!! Form::text('title',null, ['class'=>'form-control'])!!}
      </div>

      <div class="form-group">
      {!! Form::label('content', 'Content:')!!}
      {!! Form::textarea('content',null, ['class'=>'form-control'])!!}
      </div>
    
    <div class="form-group">
      {!! Form::label('tags', 'Tags:')!!}
      {!! Form::select('tags_list[]', $tags,null,['id','tags_list','multiple','multiple'])!!}
    </div>
  <div class="form-group">
      {!! Form::label('type', 'Type')!!}
      {!!Form::select('type', $types) !!}
  </div>
  <div class="form-group">
      {!! Form::label('workflowName', 'workflowName:')!!}
      {!!Form::select('workflowName', $workflows) !!}
  </div>
   <div class="form-group">
      {!! Form::label('workflowName', 'State:')!!}
      {!!Form::select('state', $workflows) !!}
  </div>

   <div class="form-group">
      {!!Form::label('fileUpload', 'Upload a file') !!}
      {!!Form::file('fileUpload',['class'=>'file-primary'])!!}
  </div>
       

  <div class="form-group">
     {!! Form::submit('Create new article', ['class'=> 'btn-primary form-control']) !!}
  </div>
  
  {!! Form::close() !!}
</div>

@endsection
