@extends('layout.default')

@section('content')


<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
	<div style = "padding: 20px 20px" >
		<h2>Список проектов<span class="glyphicon glyphicon-asterisk"></span></h2>
		<a href="/project/create" <button type="button" class="btn btn-primary navbar-btn">Создать проект <span class="glyphicon glyphicon-plus"></span></button></a>
    	<table class="table table-striped">
    <thead>
    <tr>
        <th>№</th>
        <th>Наименование проекта</th>
        <th>Описание</th>
        <th>Доступ</th>
        <th>Последнее обновление</th>
    </tr>
    </thead>
    <tbody>
    <tr class="hidden"></tr>
    	@foreach( $projects as $project)
    	<tr> 
    	<td>{{$project['id']}}</td>
    	<td><a href="/project/{{$project['id']}}">{{$project['project']}}</a>
    	<a href="/project/{{$project['id']}}/edit"> <span class="glyphicon glyphicon-edit"></span></a>

    	<span style="font-size:10px;display:block;">{{$project['alias']}} ({{$project['decnum']}})</span>
    	</td>
    	<td>{{$project['description']}}</td>
    	<td>
    		<span style="font-size:10px;display:block;">Суперадминистратор</span>
    		<span style="font-size:10px;display:block;">Тестовый пользователь</span>


    	</td>
    	<td>{{$project['updated_at']}}</td>
    	</tr>
    	@endforeach
    </tbody>
    </table>
    </div>
	</div>
</div>