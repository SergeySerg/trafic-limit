@extends('adminpanel')

@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ route('admin_dashboard') }}">Главная</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>

    <li>
        <a href="{{ route('settings_index') }}">Настройки</a>

        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>
    @if(isset($setting))
        <li class="active">{{ $setting->id }}</li>
    @else
        <li class="active">Добавить новую настройку</li>
    @endif
@stop

@section('content')

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                @if(isset($setting))
                    Редактировать
                @else
                    Добавить новую настройку
                @endif
            </h1>
        </div><!--/.page-header-->

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <form class="form-horizontal" id="resource-form" method="POST" action="" />

                {{--<div class="control-group">
                    <label class="control-label" for="title">Назва</label>

                    <div class="controls">
                        <input type="text" name="title" value='{{ $setting -> title or '' }}' placeholder="Назва налаштування" />
                    </div>
                </div>--}}
                <div class="control-group">
                    <label class="control-label" for="title">Название поля</label>

                    <div class="controls">
                        <input type="text" name="name" value='{{ $setting -> name or '' }}' placeholder="Название" readonly/>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="priority">Значение</label>

                    <div class="controls">
                        <input type="text" name="description" value='{{ $setting -> description or '' }}' placeholder="Значение настройки" />
                    </div>
                </div>



                <div class="space-4"></div>
                <input type="hidden" name="_method" value='{{$action_method}}'/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-actions">
                    <button class="btn btn-info resource-save" type="button">
                        <i class="icon-ok bigger-110"></i>
                        Сохранить
                    </button>
                </div>
                </form>
                <!--PAGE CONTENT ENDS-->
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
    <div id="token" style="display: none">{{csrf_token()}}</div>
@stop
