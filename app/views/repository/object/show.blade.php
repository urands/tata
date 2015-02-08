@extends('layout.default')

@include('repository.project.menu')

@section('content')

<div class="row">
<div class="col-sm-3 col-md-2 left">
@yield('leftmenu')
</div>
<div class="col-sm-9 col-md-10">
<div class="container-fluid">
 <h3>{{$object['title']}} (Инв.№ {{$object['uid']}}) <a href="/object/{{$object['id']}}/edit"><span class="glyphicon glyphicon-edit"></span></a>
 <a href="/object/create/{{$object['id']}}"><span class="glyphicon glyphicon-plus" style="color:green;"></span></a></h3>
 <span style="font-size:18px;color:#555;">{{$object['name']}} ({{$object['type']}}) <span class="treesm">{{$object['updated_at']}}</span></span>
<hr>
<div class="label label-warning">Разработка: Наплнение элементов в данный момент может не соответствовать реальным объектам.</div>
 <div>
 
 <div class="row">
<div class="col-sm-7 col-md-6">
<h4>Описание:</h4>
 <table class="table table-condensed table-hover">
 	<tr><td>Статус</td><td><span class='label label-success'>принято в архив</span></td></tr>
 	<tr><td>Подразделение</td><td>НИИ ВСиСУ</td></tr>
 	<tr><td>Применяемость</td><td>
@if ( $object->getParent() )
 	<a href="/object/{{$object->getParent()->id}}" >{{$object->getParent()->name}} ({{$object->getParent()->title}})</a>
@endif
</td></tr>

 	<tr><td>Наименование</td><td>{{$object['name']}} <a href="#"><span class='label label-info'>Скачать</span></td></tr>
 	<tr><td>Инвентарный номер</td><td>{{$object['uid']}}</td></tr>
 	<tr><td>Децимальный номер</td><td>{{substr($object['name'],0 ,19)}} <a href="#" onclick="jQuery('#shifr').show();"><span class='label label-info' >Расшифровать</span></a><span class='treesm' id='shifr'> <img  src="{{ url('images/loadersm.gif') }}" /> Расшифровка номера</span></td></tr>
	<tr><td>Дата поступления</td><td>{{$object['created_at']}}</td></tr>
	<tr><td>Дата обновления</td><td>{{$object['updated_at']}}</td></tr>
	<tr><td>Колличество листов</td><td>2</td></tr>
	<tr><td>Формат</td><td>А1(1-2)</td></tr>
	<tr><td>Литера</td><td>01</td></tr>
	<tr><td>Контрольная сумма</td><td>{{$object['crc']}}<img src="{{ url('images/loadersm.gif') }}" /></td></tr>
	<tr><td>Тип документа</td><td>{{$object['type']}}</td></tr>
	<tr><td>Автор документа</td><td>тестовый пользователь</td></tr>
	<tr><td>Проверил(н/контр.)</td><td>тестовый пользователь</td></tr>


 </table>
 </div>

<div class="col-sm-2 col-md-4">
 <h4>Документ применяется в:</h4>
<?php $cnt = 0; ?>
 @foreach ($object->findChildren()->get() as $obj)
<div>
<span class='glyphicon glyphicon-ok' style="color:green"></span>
<a href="/object/{{$obj->id}}">{{$obj->title}} ({{$obj->name}}) </a><span class="treesm">{{$obj->type}}</span></div>
<?php $cnt++; ?>
 @endforeach
@if ($cnt == 0)
<div><span class='glyphicon glyphicon-ok' style="color:green"></span> зависимых документов нет</div>
@endif

<h4>Обязательные документы(по ЕСКД):</h4>
@if ($cnt != 0)
<div><span class='glyphicon glyphicon-warning-sign' style="color:red"></span> ведомость покупных изделий</div>
@else
<div><span class='glyphicon glyphicon-ok' style="color:green"></span> отсутствующих документов нет</div>
@endif
 </div>
 </div>


 <h4>Аннулированные:</h4>
 нет
 <h4>Извещения (статично):</h4>
  <div class="row">
<div class="col-sm-7 col-md-6">
 <table class="table table-striped table-condensed table-hover">
 <thead>
 <th>№</th>
 <th>№ Извещения</th>
 <th>Дата</th>
 <th>Листы</th>
 <th>Примечание</th>
 </thead>
 	<tr><td>1</td><td><a href="#">АЕСН.299-12</a></td><td>28.02.11</td><td>-</td><td>лит 01</td></tr>
 	<tr><td>2</td><td><a href="#">АЕСН.369-13</a></td><td>01.12.13</td><td>1-2</td><td>исправления</td></tr>
 	

 </table>
 </div>
 </div>

<h4>Учтенные абоненты:</h4>
<p>НИИ ВСиСУ</p>
<p>Протон-МИЭТ</p>

<h4>Выдача копий (статично):</h4>
 <div class="row">
<div class="col-sm-7 col-md-6">
 <table class="table table-striped table-condensed table-hover">
 <thead>
 <th>№</th>
 <th>Абонент</th>
 <th>Дата</th>
 <th>Колличество экз. и № док.</th>
 
 <th>Примечание</th>
 </thead>
 	<tr><td>1</td><td><a href="#">НИИ ВСиСУ</a></td><td>28.02.11</td><td>1б</td><td>-</td></tr>
 	<tr><td>2</td><td><a href="#">Протон-МИЭТ</a></td><td>01.12.13</td><td>1к</td><td>повторно</td></tr>
 	

 </table>
 </div>
 </div>

<h4>Журнал:</h4>
<div class="row">
<div class="col-sm-9 col-md-10">
	<i> {{$object['created_at']}}</i> <span class="label label-success">Принято в архив</span>
	{{$object['title']}}(<a href="/object/{{$object['id']}}">{{$object['name']}}</a>) {{$object['type']}} <b class="logcrc">{{$object['crc']}}</b>
	<span class="loguser">Тестовый пользователь</span>
</div>

<div class="col-sm-9 col-md-10">
	<i> {{$object['created_at']}}</i> <span class="label label-info">Создано</span>
	{{$object['title']}}(<a href="/object/{{$object['id']}}">{{$object['name']}}</a>) {{$object['type']}} <b class="logcrc">{{$object['crc']}}</b>
	<span class="loguser">Тестовый пользователь</span>
</div>
</div>

 </div>
</div>
</div>

</div>

@stop