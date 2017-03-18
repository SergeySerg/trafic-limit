@extends('adminpanel')

@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ route('admin_dashboard') }}/">Главная</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>

    <li>
        <a href="{{ route('admin_index')}}">Мониторинг</a>
    <span class="divider">
        <i class="icon-angle-right arrow-icon"></i>
    </span>
    </li>
    @if(isset($company))
        <li class="active">{{$company->name}}</li>
    @else
        <li class="active">Добавить новую компанию</li>
    @endif
@stop

@section('content')

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>{{ isset($company) ? "Редакторование" : 'Добавление' }}</h1>

        </div><!--/.page-header-->

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <form class="form-horizontal" id="resource-form" method="POST" action="" />

                    <div class="control-group">
                        <label class="control-label" for="form-field-select-3">Выбор компании</label>
                        <div class="controls">
                            <select class="chzn-select" name="name" id="form-field-select-3" data-placeholder="Выберете компанию...">
                                @if(isset($company))
                                    <option value="{{$company->name }}" data-id="{{$company->company_id }}" />{{ $company->name }}
                                @else
                                    <option value="" />
                                @endif
                                @if(isset($companies))
                                    @foreach($companies as $monitoring_company)
                                        <option value="{{ $monitoring_company->name }}" data-id="{{ $monitoring_company->id }}" />{{ $monitoring_company->name }}
                                    @endforeach
                                @endif

                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-select-1">Тип фильтра</label>
                        <div class="controls">
                            <select id="form-field-select-1" name="type">
                                <option value="Расход" @if ( isset($company) AND ($company->type == "Расход")) selected @endif/>Расход
                                <option value="Продажи" @if ( isset($company) AND ($company->type == "Продажи")) selected @endif />Продажи
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-2">Лимит</label>

                        <div class="controls">
                            <input type="text" id="form-field-2" name="limit" placeholder="Установите лимит" value="{{ isset($company) ? $company->limit : '' }}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="form-field-select-3">Сравнение</label>
                        <div class="controls">
                            <select id="form-field-select-3" name="comparison">
                                <option value="0" @if ( isset($company) AND !($company->comparison )) selected @endif/>Более
                                <option value="1" @if ( isset($company) AND ($company->comparison )) selected @endif />Менее
                            </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Статус</label>
                        <div class="controls">
                            <div class="row-fluid">
                                <div class="span3">
                                    <label>
                                        <input name='reported' type='hidden' value='0'>
                                        <input name='reported' class="ace-switch ace-switch-6" type="checkbox" value=1 @if(isset($company) AND $company -> reported) checked="checked" @endif />
                                        <span class="lbl"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <input type="hidden" name="company_id" value=''/>
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

