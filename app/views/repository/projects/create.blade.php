@extends('layout.default')

@section('content')

<div style="padding: 20px 20px;"> 

<h2>Создать новый проект</h2>

@if(isset($project))
{{Form::model($project, array('method' => 'PUT', 'route' => ['project.update', $project['id']] ))}}
@else
{{ Form::open(array('route' => 'project.store')) }}
@endif

<table class="table-condensed">
<tr>
<td>{{Form::label('orgid', 'Организация')}}</td>
<td>{{Form::select('orgid', array('1' => 'НИИ ВС и СУ'))}}</td>
</tr>
<tr>
 <td>{{Form::label('project', 'Наименование проекта')}}</td>
 <td>{{ Form::text('project')}}</td>
</tr>
<tr>
 <td>{{Form::label('alias', 'Шифр проекта')}}</td>
 <td>{{ Form::text('alias')}}</td>
</tr>

<tr>
<td>{{Form::label('decnum', 'Децимальный номер')}}</td>
<td>{{ Form::text('decnum') }}</td>
</tr>

<tr>
<td>{{Form::label('description', 'Описание проекта')}}</td>
<td>{{ Form::textarea('description') }}</td>
</tr>

@if(isset($project))
<tr><td></td><td>{{ Form::submit('Сохранить изменения') }}</td></tr>
@else
<tr><td></td><td>{{ Form::submit('Создать проект') }}</td></tr>
@endif

 
</table>    
@if(isset($project))
@endif
{{ Form::close() }}


</div>