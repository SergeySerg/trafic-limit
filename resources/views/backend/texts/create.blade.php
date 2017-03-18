@extends('adminpanel')

@section('breadcrumbs')
<li>
    <i class="icon-home home-icon"></i>
    <a href="{{ route('admin_dashboard') }}">Головна</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
</li>

<li>
    <a href="{{ route('text_index') }}">Текстові блоки</a>

        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
</li>

<li class="active">Додати новий</li>
@stop

@section('content')

<div class="page-content">
    <div class="page-header position-relative">
        <h1>
            Додати
        </h1>
    </div><!--/.page-header-->

    <div class="row-fluid">
        <div class="span12">
            <!--PAGE CONTENT BEGINS-->

            <form class="form-horizontal" id="resource-form" method="POST" action="" />


                    <div class="control-group">
                        <label class="control-label" for="type">Тип блоку</label>

                        <div class="controls">
                            <select name="type">
                                <option>
                                    </option><option value="input" selected="selected">Звичайне поле
                                    </option><option value="textarea">Текстве поле
                                    </option><option value="textarea-no-wysiwyg">Текстве поле(без редактора)
                                 </option>
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="title">Назва блоку</label>

                        <div class="controls">
                            <input type="text" name="title" value='' placeholder="Назва блоку" />
                        </div>
                    </div>

                     <div class="control-group">
                    <label class="control-label" for="title">Альтернативна назва блоку</label>

                    <div class="controls">
                        <input type="text" name="name" value='' placeholder="Альтернативна назва" />
                    </div>
                </div>

                    <div class="control-group">
                        <label class="control-label" for="priority">Пріоритет</label>

                        <div class="controls">
                            <input type="text" name="priority" value='' placeholder="Пріоритет" />
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="lang_active">Багатомовність</label>

                        <div class="controls">
                            <select name="lang_active">
                                <option>
                                    </option><option value="1" selected>На декількох мовах
                                    </option><option value="0">Одне значення на всі мови
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="space-12"></div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="tabbable">
                                <ul class="nav nav-tabs" id="myTab2">
                                    @foreach($langs as $lang)
                                    <li @if(($lang->lang) == 'ua') class="active" @endif >
                                        <a data-toggle="tab" href="#{{$lang->lang}}">{{$lang->lang}}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class="tab-content">
                                @foreach($langs as $lang)
                                <div id="{{$lang->lang}}" @if(($lang->lang) == 'ua') class="tab-pane in active" @else class="tab-pane" @endif>

                                    <div class="control-group">
                                        <label class="control-label" for="description_{{$lang->lang}}">Значення</label>

                                        <div class="controls">
                                            <input type="text" name="description_{{$lang->lang}}" value='' placeholder="Значення" />
                                        </div>
                                    </div>

                                </div>
                                @endforeach
                            </div>

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
