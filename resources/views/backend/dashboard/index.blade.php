@extends('adminpanel')


@section('breadcrumbs')

    <li class="active">
        <i class="icon-home home-icon"></i>
        Главная
    </li>
@stop

@section('content')
<div class="page-content">
    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->
            <div class="row-fluid">
                <h3 class="header smaller lighter blue">Панель управления</h3>
                <div class="row-fluid">
                    <div class="span12 well">
                        Добро пожаловать в панель управления
                    </div>
                </div>
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="icon-remove"></i>
                    </button>
                    <strong>Внимание!</strong>
                   Выберете необходимый для редактирования раздел в левом меню.
                </div>
            </div>
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>


@stop