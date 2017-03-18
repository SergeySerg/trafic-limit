@extends('adminpanel')


@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ $url }}">Головна</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>
    <li class="active">{{ $admin_category->getTranslate('title') }}</li>
@stop

@section('content')
<div class="page-content">
    <div class="row-fluid">
        <div class="span12">
             <!--PAGE CONTENT BEGINS-->
            <div class="row-fluid">

                <h3 class="header smaller lighter blue">
                    {{$admin_category->getTranslate('title')}}&nbsp;&nbsp;&nbsp;&nbsp;
                    @if( (Auth::user()->name) == 'root' )
                        <a href='{{ $url }}/categories/{{$type}}' class="line_none">
                            <button class="btn btn-mini btn-success">
                                <i class="icon-edit bigger-120"></i>
                            </button>
                        </a>
                    <a href='{{ $url }}/categories/{{$type}}' data-id="{{ $admin_category->id }}" class="category-delete">
                        <button class="btn btn-mini btn-danger"  >
                            <i class="icon-trash bigger-120"></i>
                        </button>
                    </a>
                    @endif
                </h3>

                <div class="table-header">
                    Список в категорії {{$admin_category->getTranslate('title')}}
                    <a href="{{ $url }}/articles/{{$type}}/create" class="line_none">
                        <button class="btn btn-warning">
                            <i class="icon-plus"></i>
                                Додати елемент в категорію {{$admin_category->getTranslate('title')}}
                        </button>
                    </a>
                </div>
                <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="center">
                            ID
                        </th>
                        <th class="center">Назва</th>
                        <th class="center hidden-phone">
                            <i class="icon-time bigger-110 hidden-phone"></i>
                            Дата створення
                        </th>
                        <th class="center hidden-phone">
                            <i class="icon-time bigger-110 hidden-phone"></i>
                            Дата оновлення
                        </th>

                       <!-- <th class="hidden-phone">
                            <i class="icon-time bigger-110 hidden-phone"></i>
                            Update
                        </th>-->
                        @if (Request::is('*/news'))
                            <th class="hidden-phone">
                                <i class="icon-time bigger-110 hidden-phone"></i>
                                Дата публікації
                            </th>
                        @else
                            <th class="hidden-phone">Ціна</th>
                        @endif
                        <th class="center">Статус</th>
                        <th>Пріоритет</th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                        @foreach($admin_articles as $admin_article)
                            <tr>
                                <td class="center">
                                    <label>
                                        <span class="lbl">{{ $admin_article->id }}</span>
                                    </label>
                                </td>
                                <td>
                                    <a href="{{ $url }}/articles/{{$type}}/{{$admin_article->id}}">{!! $admin_article->getTranslate('title') !!}</a>
                                </td>
                                <td  class="hidden-phone">{{ $admin_article->created_at }}</td>
                                <td  class="hidden-phone">{{ $admin_article->updated_at }}</td>
                                @if (Request::is('*/news'))
                                    <td  class="hidden-phone">{{ $admin_article->date }}</td>
                                @else
                                    <td  class="hidden-phone">{{ $admin_article->price }}</td>
                                @endif
                                <td class="center">
                                    @if($admin_article->active)
                                        <span class="badge badge-success"><i class="icon-ok bigger-120"></i></span>
                                    @else
                                        <span class="badge badge-important"><i class="icon-remove"></i></span>
                                    @endif
                                </td>

                                <td class="center">{{ $admin_article->priority }}</td>

                                <td class="td-actions">
                                    <div class="hidden-phone visible-desktop action-buttons">
                                        <a class="green" href="{{ $url }}/articles/{{$type}}/{{$admin_article->id}}">
                                            <i class="icon-pencil bigger-130"></i>
                                        </a>

                                        <a href='{{ $url }}/articles/{{$type}}/{{$admin_article->id}}' data-id='{{$admin_article->id}}' class='resource-delete'>
                                            <i class="icon-trash bigger-130"></i>
                                        </a>
                                    </div>

                                    <div class="hidden-desktop visible-phone">
                                        <div class="inline position-relative">
                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                                <i class="icon-caret-down icon-only bigger-120"></i>
                                            </button>

                                            <ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
                                                <li>
                                                    <a href="{{ $url }}/articles/{{$type}}/{{$admin_article->id}}" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="icon-zoom-in bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ $url }}/articles/{{$type}}/{{$admin_article->id}}" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href='{{ $url }}/articles/{{$type}}/{{$admin_article->id}}' data-id='{{$admin_article->id}}' class='resource-delete' class="tooltip-error" data-rel="tooltip" title="Delete">
                                                        <span class="red">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                         @endforeach
                    </tbody>
                </table>
            </div>
         <!--PAGE CONTENT ENDS-->
        </div><!--/.span-->
    </div><!--/.row-fluid-->
</div>
<div id="token" style="display: none">{{csrf_token()}}</div>
<script>
    $(function(){
        var oTable1 = $('#sample-table-2').dataTable( {
            "aaSorting": [[6,'desc']],
            "aoColumns": [
                { "bSortable": false },
                null, null,null, null,null, null,
                { "bSortable": false }
            ] } );
    });
</script>
@stop
{{-- @if( (Auth::user()->name) == 'root' )
                    <div id="accordion2" class="accordion">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                    <i class="icon-edit bigger-230"></i>
                                   <span class="edit_category" style="font-size: 32px;">{{$admin_category->name}}</span>
                                </a>
                            </div>

                            <div class="accordion-body collapse" id="collapseOne">
                                <div class="accordion-inner">
                                    <form class="form-horizontal" id="resource-form" method="POST" action="" />

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-1">Link</label>
                                            <div class="controls">
                                                <input type="text" id="form-field-1" name="link" @if(isset($admin_category)) value='{{$admin_category->link}}'@endif  />
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
                                                                    <label class="control-label" for="form-field-3">Назва категорії</label>
                                                                    <div class="controls">
                                                                        <input type="text" name="title_{{$lang->lang}}" value='@if(isset($admin_category)){{ $admin_category->getTranslate('name', $lang->lang) }}@endif' id="form-field-3" placeholder="Назва категорії" />
                                                                    </div>
                                                                </div>

                                                                <h4 class="header blue clearfix">Короткий опис</h4>
                                                                <div class="control-group">
                                                                    <textarea name="short_description_{{$lang->lang}}"class="span12" id="form-field-8" placeholder="Короткий опис категорії">@if(isset($admin_category)){{ $admin_category->getTranslate('short_description',$lang->lang) }}@endif</textarea>
                                                                </div>

                                                                <h4 class="header blue clearfix">Опис</h4>
                                                                <div class="control-group">
                                                                     <textarea name="description_{{$lang->lang}}"class="span12" id="form-field-8" placeholder="Повний опис категорії">@if(isset($admin_category)){{ $admin_category->getTranslate('description',$lang->lang) }}@endif</textarea>
                                                                </div>

                                                                <h4 class="header blue clearfix">SEO</h4>

                                                                <div class="control-group">
                                                                    <label class="control-label" for="form-field-4">META Title</label>
                                                                    <div class="controls">
                                                                        <input type="text" id="form-field-4" name="meta_title_{{$lang->lang}}" value="@if(isset($admin_category)){{ $admin_category->getTranslate('meta_title',$lang->lang) }}@endif"/>
                                                                    </div>
                                                                </div>

                                                                <div class="control-group">
                                                                    <label class="control-label" for="form-field-5">META Description</label>
                                                                    <div class="controls">
                                                                        <input type="text" id="form-field-5" name="meta_description_{{$lang->lang}}" value="@if(isset($admin_category)){{ $admin_category->getTranslate('meta_description',$lang->lang)}}@endif"/>
                                                                    </div>
                                                                </div>

                                                                <div class="control-group">
                                                                    <label class="control-label" for="form-field-tags">META Keywords</label>

                                                                    <div class="controls">
                                                                        <input type="text" name="meta_keywords_{{$lang->lang}}" class="form-field-tags" value="@if(isset($admin_category)){{ $admin_category->getTranslate('meta_keywords',$lang->lang)}}@endif" placeholder="Введіть ключові слова ..." />
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    @endforeach

                                                    @if(isset($admin_category))
                                                        <h4 class="header green clearfix">
                                                            Gallery
                                                        </h4>
                                                        <iframe
                                                            frameborder="0"
                                                            src="/js/backend/kcfinder/browse.php?type=images&langCode=ru&homedir=/{{$admin_category->id}}/&config=categories"
                                                            style="width: 100%; height: 400px"
                                                            title="Визуальный файловый браузер"
                                                            tabindex="0"
                                                            allowtransparency="true">
                                                        </iframe>
                                                    @else
                                                        <div class="alert alert-warning">
                                                            <button type="button" class="close" data-dismiss="alert">
                                                                <i class="icon-remove"></i>
                                                            </button>
                                                            <strong>Увага!</strong>
                                                            Форма завантаження файлів до галереї буде доступною після створення даного запису (при наступному редагуванні)
                                                            <br>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="space-4"></div>
                                        <div class="control-group">
                                            <label class="control-label">Статус</label>
                                            <div class="controls">
                                                <div class="row-fluid">
                                                    <div class="span3">
                                                        <label>
                                                            <input name='active' type='hidden' value='0'>
                                                            <input name='active' class="ace-switch ace-switch-6" type="checkbox" value=1 @if(isset($admin_category) AND $admin_category->active) checked="checked" @endif />
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="form-field-2">Пріоритет</label>

                                            <div class="controls">
                                                <input type="number" id="form-field-2" name="priority" @if(isset($admin_category)) value='{{$admin_category->priority}}' @endif  />
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="id-date-picker-1">Дата</label>
                                            <div class="controls">
                                                <div class="row-fluid input-append">
                                                    <input class="span2 date-picker" name="date" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" @if(isset($admin_category)) value='{{date('d-m-Y',strtotime($admin_category->date))}}' @endif/>
                                                        <span class="add-on">
                                                            <i class="icon-calendar"></i>
                                                       </span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                        <div class="form-actions">
                                            <button class="btn btn-info resource-save" type="button">
                                                <i class="icon-ok bigger-110"></i>
                                                Сохранить
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif--}}