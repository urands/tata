@extends('layout.default')

@include('repository.project.menu')

@section('content')

<div class="row">
<div class="col-sm-3 col-md-2 left">
@yield('leftmenu')
</div>
<div class="col-sm-9 col-md-10">
<div class="container-fluid">
<div class="row">
<div class="col-sm-4 col-md-3">
 <h3>{{$project['project']}} </h3>
 <span style="font-size:14px;color:#059;">{{$project['alias']}} ({{$project['decnum']}})</span>
 </div>
<div class="col-sm-5 col-md-6">
<div style = "padding-top: 20px;">
<button type="button" class="btn btn-default navbar-btn">Загрузить <span class="glyphicon glyphicon-download"></span></button>
<button type="button" class="btn btn-default navbar-btn">Создать документ</button>
<button type="button" class="btn btn-default navbar-btn">Списки изменений</button>
<button type="button" class="btn btn-default navbar-btn">Проверка</button>
</div>
</div>


 </div>
<hr>
 <div>
 <h4>Список документов в проекте:</h4>
<div class="row">
@foreach($listdoc as $doc)
<div class="col-md-3">
<div style="padding: 5px 0px;">
<a href="/object/{{$doc->id}}">{{$doc->name}}</a>
<img src="{{ url('images/loadersm.gif') }}" />


<span class='listcrc'>{{$doc->title}} <span class='label  label-default
@if ( $doc->type == 'Перечень')
label-success
@endif
@if ( $doc->type == 'Спецификация')
label-primary
@endif
@if ( $doc->type == 'Схема электрическая')
label-info
@endif
' >{{$doc->type}}</span></span>
</div>
</div>
@endforeach

</div>

<div class="row"><div class="col-md-12">
<hr/>
<div id="objectulist">
<h4 style="color:red;">Список документов не включенных в проект:</h4>
<div id="ulist" projectid="{{$project['id']}}" >
	<img src="{{ url('images/loader.gif') }}" />
</div>
</div>
</div></div>



 </div>
</div>
</div>

</div>

@stop