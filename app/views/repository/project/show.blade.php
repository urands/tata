@extends('layout.default')

@include('repository.project.menu')

@section('content')

<div class="row">
<div class="col-sm-3 col-md-2 left">
@yield('leftmenu')
</div>
<div class="col-sm-9 col-md-10">
<div class="container-fluid">
 <h3>{{$project['project']}} </h3>
 <span style="font-size:14px;color:#059;">{{$project['alias']}} ({{$project['decnum']}})</span>
<hr>

<button type="button" class="btn btn-default navbar-btn">Загрузить <span class="glyphicon glyphicon-download"></span></button>
<button type="button" class="btn btn-default navbar-btn">Создать документ</button>
<button type="button" class="btn btn-default navbar-btn">Списки изменений</button>
<button type="button" class="btn btn-default navbar-btn">Проверка</button>
 <div>
 <h4>Описание проекта:</h4>
 <p>{{$project['description']}}</p>

<h4>Последние изменения:</h4>

<div class="col-sm-9 col-md-10">
	<i> 29.09.2014 12:45</i> <span class="label label-danger">Удалено</span>
	Плата обработки (<a href="/object/16">АЕСН.401161.008Т5Мизм02.zip</a>) Деталь <b class="logcrc">0E87342</b>
	<span class="loguser">Тестовый пользователь</span>
</div>
<div class="col-sm-9 col-md-10">
	<i> 29.09.2014 12:05</i> <span class="label label-success">Добавлено</span>
	Плата обработки (<a href="/object/13">(АЕСН.401161.008ПЭ3изм02.pdf)</a> Перечень<b class="logcrc">0700000</b>
	<span class="loguser">Тестовый пользователь</span>
</div>
<div class="col-sm-9 col-md-10">
	<i> 29.09.2014 12:05</i> <span class="label label-info">Изменены данные</span>
	Плата обработки (<a href="/object/16">АЕСН.401161.008Т5Мизм02.zip</a>) Деталь <b class="logcrc">0E87342</b>
	<span class="loguser">Тестовый пользователь</span>
</div>
<div class="col-sm-9 col-md-10">
	<i> 29.09.2014 12:01</i> <span class="label label-success">Добавлено</span>
	Плата обработки (<a href="/object/16">АЕСН.401161.008Т5Мизм02.zip</a>) Деталь <b class="logcrc">0E87342</b>
	<span class="loguser">Тестовый пользователь</span>
</div>
<div class="col-sm-9 col-md-10">
	<i> 29.09.2014 12:00</i> <span class="label label-success">Добавлено</span>
	Плата обработки (<a href="/object/16">АЕСН.401161.008Т5Мизм02.zip</a>) Деталь <b class="logcrc">Контрольная сумма: 0E87342</b>
	<span class="loguser">Тестовый пользователь</span>
</div>





 </div>
</div>
</div>

</div>

@stop