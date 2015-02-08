@extends('layout.default')

@section('content')

<h2>Список файлов в проекте <span class="glyphicon glyphicon-asterisk"></span></h2>


<button type="button" class="btn btn-success navbar-btn">Загрузить файл <span class="glyphicon glyphicon-download"></span></button>
<button type="button" class="btn btn-default navbar-btn">Сформировать отчет <span class="glyphicon glyphicon-book"></span></button>
<button type="button" class="btn btn-default navbar-btn">Что то сделать еще </button>
<button type="button" class="btn btn-default navbar-btn">Sign in</button>


<table class="table table-striped table-condensed">
    <thead>
    <tr>
        <th>Инвентарный номер</th>
        <th>Дата изменения</th>
        <th>Наименование документа<span class="glyphicon glyphicon-sort-by-attributes"></span></th>
        <th>Изм./расш.</th>
        <th>Контрольная сумма</th>
        <th>Описание</th>
        <th>Изделие</th>
        <th>Отметки</th>
        <th>Операции</th>
    </tr>
    </thead>
    <tbody>
    <tr class="hidden"></tr>
    <tr class="hidden">
        <td><input type="text" class="form-control " placeholder="Search..."></td>
        <td><input type="text" class="form-control " placeholder="Search..."></td>
        <td><input type="text" class="form-control " placeholder="Search..."></td>
        <td><input type="text" class="form-control " placeholder="Search..."></td>
        <td><input type="text" class="form-control " placeholder="Search..."></td>
        <td><input type="text" class="form-control " placeholder="Search..."></td>
        <td><input type="text" class="form-control " placeholder="Search..."></td>
        <td><input type="text" class="form-control " placeholder="Search..."></td>
        <td><input type="text" class="form-control " placeholder="Search..."></td>
    </tr>

    @foreach( $files as $file)
    <tr>
        <td>1545454 М</td>
        <td>04.12.12</td>
        <td>{{$file['name']}}
            {{$file['ext']}}
        </td>
        <td><a href="#">01.dwg</a></td>
        <td>
            <span class="ncbasecrc" filename="{{$file['name']}}" >{{$file['signature']}}</span>
        </td>
        <td>Плата АЦП-А.
            <br/><span class="label label-success help-block">Схема электрическая принципиальная</span>
        </td>

        <td>@mdo</td>
        <td><span class="label label-success">Актуально</span></td>
        <td><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
    </tr>

    @endforeach



    <tr>
        <td>1545454 М</td>
        <td>04.12.12</td>
        <td><a href="#">ПБА3.661711Э3</a>

        </td>
        <td><a href="#">01.dwg</a></td>
        <td>DH87890EA</td>
        <td>Плата АЦП-А.
            <br/><span class="label label-success help-block">Схема электрическая принципиальная</span>
        </td>

        <td>@mdo</td>
        <td><span class="label label-success">Актуально</span></td>
        <td><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
    </tr>
    <tr>
        <td>1545454 М</td>
        <td>04.12.12</td>
        <td><a href="#">ПБА3.661711Э3ВП</a>


        </td>
        <td><a href="#">01.dwg</a></td>
        <td>DH87890EA</td>
        <td>Компонент ЗИП одиночный (ЗИП-О) на один прибор ВС-123-02СМ.
            <br/><span class="label label-primary">Ведомость покупных изделий.</span>
        </td>
        <td>@mdo</td>
        <td><span class="label label-default">Отсутствует</span></td>
        <td><button type="button" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button></td>
    </tr>
    <tr>
        <td>1545454 М</td>
        <td>04.12.12</td>
        <td><a href="#">ПБА3.661711ПЭ3</a>

        </td>
        <td><a href="#">01.dwg</a></td>
        <td>DH87890EA</td>
        <td>Плата АЦП-А.
        <br/><span class="label label-warning help-block">Перечень элементов</span>
        </td>
        <td>Блок БСНВ-Д</td>
        <td><span class="label label-danger">Не соответствует</span></td>
        <td><button type="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
    </tr>
    </tbody>
</table>

@stop