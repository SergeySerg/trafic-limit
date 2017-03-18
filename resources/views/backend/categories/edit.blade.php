@extends('adminpanel')

@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ $url }}/">Головна</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>
    @if (isset($admin_category))
        Редагування категорії
    @else
        Додати категорію
    @endif
@stop

@section('content')

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                @if (isset($admin_category))
                    Редагувати категорію
                @else
                    Додати категорію
                @endif
            </h1>
        </div><!--/.page-header-->
        <div class="row-fluid">
            <div class="span12">



                <!--PAGE CONTENT BEGINS-->
                <form class="form-horizontal" id="resource-form-category" method="POST" action="" enctype="multipart/form-data" />

                <div class="tabbable tabs-left">
                    <ul class="nav nav-tabs" id="myTab3">
                        <li class="active">
                            <a data-toggle="tab" href="#link3">
                                <i class="pink icon-external-link bigger-110"></i>
                                Link
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#picture3">
                                <i class="fa fa-file-image-o fa-fw" aria-hidden="true"></i>
                                Картинка категории
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#active13">
                                <i class="fa fa-check fa-fw" aria-hidden="true"></i>
                                Статус
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#priority13">
                                <i class="fa fa-sort-numeric-desc fa-fw" aria-hidden="true"></i>
                                Пріоритет
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#date13">
                                <i class="fa fa-calendar fa-fw" aria-hidden="true"></i>
                                Дата
                            </a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#parrent13">
                                <i class="fa fa-link fa-fw" aria-hidden="true"></i>
                                Відношення до записів
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" style="min-height: 160px;">
                        <div id="link3" class="tab-pane in active">
                            <div class="control-group">
{{--
                                <label class="control-label" for="form-field-1">Link</label>
--}}
                                <div class="controls">
                                    <input type="text" id="form-field-1" name="link" @if(isset($admin_category)) value='{{$admin_category->link}}'@endif  />
                                </div>
                            </div>
                        </div>

                        <div id="picture3" class="tab-pane">
                            <div class="control-group">
                                @if(isset($admin_category) && $admin_category->img)
{{--
                                    <label class="control-label">Картинка категорії</label>
--}}
                                    <div class="controls" id="show-image" >
                                        <div class="row-fluid">
                                            <div class="span3">
                                                <div class="profile-activity clearfix" style="border-bottom: none">
                                                    <div>
                                                        <img class="pull-left" alt="{{ $admin_category->link }}" style="max-width:100px" src="{{ asset($admin_category->img) }}">
                                                    </div>

                                                    <div class="tools action-buttons">
                                                        <a href="#" class="blue">
                                                            <i class="icon-pencil bigger-125 " id="image-edit" ></i>
                                                        </a>

                                                        <a href="#" class="red">
                                                            <i class="icon-remove bigger-125" id="image-close"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="controls" id="image-upload" style="display:none">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="widget-box">
                                                    <div class="widget-header">
                                                        <h4>Картинка категорії</h4>
                                                <span class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                    {{-- <a href="#" data-action="close">
                                                         <i class="icon-remove"></i>
                                                     </a>--}}
                                                </span>
                                                    </div>
                                                    <div class="widget-body">
                                                        <div class="widget-main">
                                                            {{--
                                                             <div class="ace-file-input"><input type="file" name="img" id="id-input-file-2"><label data-title="Choose"><span data-title="No File ..."><i class="icon-upload-alt"></i></span></label><a class="remove" href="#"><i class="icon-remove"></i></a></div>
                                                            --}}
                                                            <div class="ace-file-input ace-file-multiple">
                                                                <input name='img' type="file" id="id-input-file-3">
                                                                <a class="remove" href="#"><i class="icon-remove"></i></a>
                                                            </div>
                                                            {{--<label>
                                                                <input type="checkbox" name="file-format" id="id-file-format">
                                                                <span class="lbl"> Allow only images</span>
                                                            </label>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="controls">
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <div class="widget-box collapsed">
                                                    <div class="widget-header">
                                                        <h4>Картинка категорії</h4>
                                                <span class="widget-toolbar">
                                                    <a href="#" data-action="collapse">
                                                        <i class="icon-chevron-up"></i>
                                                    </a>
                                                    {{-- <a href="#" data-action="close">
                                                         <i class="icon-remove"></i>
                                                     </a>--}}
                                                </span>
                                                    </div>
                                                    <div class="widget-body">
                                                        <div class="widget-main">
                                                            {{--
                                                             <div class="ace-file-input"><input type="file" name="img" id="id-input-file-2"><label data-title="Choose"><span data-title="No File ..."><i class="icon-upload-alt"></i></span></label><a class="remove" href="#"><i class="icon-remove"></i></a></div>
                                                            --}}
                                                            <div class="ace-file-input ace-file-multiple">
                                                                <input name='img' type="file" id="id-input-file-3">
                                                                <a class="remove" href="#"><i class="icon-remove"></i></a>
                                                            </div>
                                                            {{--<label>
                                                                <input type="checkbox" name="file-format" id="id-file-format">
                                                                <span class="lbl"> Allow only images</span>
                                                            </label>--}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div id="active13" class="tab-pane">
                            <div class="control-group">
{{--
                                <label class="control-label">Статус</label>
--}}
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
                        </div>

                        <div id="priority13" class="tab-pane">
                            <div class="control-group">
{{--
                                <label class="control-label" for="form-field-2">Пріоритет</label>
--}}

                                <div class="controls">
                                    <input type="number" id="form-field-2" name="priority" @if(isset($admin_category)) value='{{$admin_category->priority}}' @endif  />
                                </div>
                            </div>
                        </div>

                        <div id="date13" class="tab-pane">
                            <div class="control-group">
{{--
                                <label class="control-label" for="id-date-picker-1">Дата</label>
--}}
                                <div class="controls">
                                    <div class="row-fluid input-append">
                                        <input class="span2 date-picker" name="date" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" @if(isset($admin_category)) value='{{date('d-m-Y',strtotime($admin_category->date))}}' @endif/>
                                    <span class="add-on">
                                        <i class="icon-calendar"></i>
                                   </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="parrent13" class="tab-pane">
                            <div class="control-group">
{{--
                                <label class="control-label" for="form-field-select-1">Відношення до записів</label>
--}}
                                <div class="controls">
                                    <select name="article_parent" id="form-field-select-1">
                                        <option value="">
                                            @foreach($admin_categories as $category_item)
                                        </option><option value="{{ $category_item->id}}" @if(isset($article_parent) && ($article_parent == $category_item->id)) selected="selected" @endif>{{ $category_item->getTranslate('title') }}
                                            @endforeach
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="control-group">
                    <label class="control-label" for="form-field-21">Картинка категорії</label>
                    <div class="controls">
                        <input type="file" id="uploadimage" name="img" --}}{{--@if(isset($admin_category)) value='{{$admin_category->link}}'@endif--}}{{--  />
                    </div>
                </div>--}}

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
                                            <input type="text" name="title_{{$lang->lang}}" value='@if(isset($admin_category)){{ $admin_category->getTranslate('title', $lang->lang) }}@endif' id="form-field-3" placeholder="Назва категорії" />
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
               {{-- <div class="control-group">
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
                <div class="control-group">
                    <label class="control-label" for="form-field-select-1">Відношення до записів</label>
                    <div class="controls">
                        <select name="article_parent" id="form-field-select-1">
                            <option value="">
                                @foreach($admin_categories as $category_item)
                                    </option><option value="{{ $category_item->id}}" @if(isset($article_parent) && ($article_parent == $category_item->id)) selected="selected" @endif>{{ $category_item->getTranslate('title') }}
                                @endforeach
                            </option>
                        </select>
                    </div>
                </div>--}}
                <div class="hr hr-18 dotted hr-double"></div>
                <h4 class="pink">
                    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
                    <a href="#modal-table" role="button" id="base" class="green" data-toggle="modal"> Базові атрибути даної категорії </a>
                </h4>
                <div class="hr hr-18 dotted hr-double"></div>

                <div class="hr hr-18 dotted hr-double"></div>
                <h4 class="pink">
                    <i class="icon-hand-right icon-animated-hand-pointer blue"></i>
                    <a href="#modal-table-attributes" role="button" class="green" data-toggle="modal"> Додаткові атрибути даної категорії </a>
                </h4>
                <div class="hr hr-18 dotted hr-double"></div>
                <input type="hidden" id="fields" name="fields" @if(isset($admin_category->fields)) value='{{ $admin_category->fields }}'@else value="" @endif/>
                <input type="hidden" name="img_status" value= 'true'/>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="_method" value='{{$action_method}}'/>
                <div class="form-actions">
                    <button class="btn btn-info resource-save-category" type="button">
                        <i class="icon-ok bigger-110"></i>
                        Сохранить
                    </button>
                </div>
                </form>
                {{--Модальное окно для основных аттрибутов--}}
                <div id="modal-table" class="modal hide fade" tabindex="-1" aria-hidden="true" style="display: none;">

                    <div class="modal-header no-padding">
                        <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            Базові атрибути
                        </div>
                    </div>

                    <div class="modal-body no-padding">
                        <div class="row-fluid">
                            <div class="span12">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">Статус</th>
                                        <th class="center">Назва поля</th>
                                        <th class="center">Назва поля в БД</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="title" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Назва
                                        </td>
                                        <td>title</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="short_description" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Короткий опис
                                        </td>
                                        <td>short_description</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="description" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Опис
                                        </td>
                                        <td>description</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="gallery" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Галерея
                                        </td>
                                        <td>imgs</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="date" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Дата
                                        </td>
                                        <td>date</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="priority" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Пріоритет
                                        </td>
                                        <td>priority</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="active" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Статус
                                        </td>
                                        <td>active</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="article_parent" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Відношення до записів
                                        </td>
                                        <td>active</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="meta_title" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Meta title
                                        </td>
                                        <td>meta_title</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="meta_description" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Meta description
                                        </td>
                                        <td>meta_description</td>
                                    </tr>
                                    <tr>
                                        <td class="center">
                                            <label>
                                                <input type="checkbox" name="meta_keywords" />
                                                <span class="lbl"></span>
                                            </label>
                                        </td>

                                        <td>
                                            Meta keywords
                                        </td>
                                        <td>meta_keywords</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!--/span-->
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
                            <i class="icon-remove"></i>
                            Close
                        </button>
                    </div>
                </div>
                {{--/Модальное окно для основных аттрибутов--}}
                {{--Модальное окно для дополнительных аттрибутов--}}
                <div id="modal-table-attributes" class="modal hide fade" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-header no-padding">
                        <div class="table-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            Додаткові атрибути
                        </div>
                    </div>

                    <div class="modal-body no-padding">
                        <div class="row-fluid">
                            <table id="attributes-list" class="table table-striped table-bordered table-hover no-margin-bottom no-border-top">
                                <thead>
                                <tr>
                                    <th class="center">Назва</th>
                                    <th class="center">Тип поля</th>
                                    <th class="center">Багатомовність</th>
                                    <th class="center">Статус</th>
                                    <th class="center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                   {{--renderAttributesTable() in global.js--}}
                                </tbody>
                            </table>

                            <div id="accordion2" class="accordion">
                                <div class="accordion-group" style="margin-top: 15px">
                                    <div class="accordion-heading">
                                        <a href="#collapseOne" data-parent="#accordion2" data-toggle="collapse" class="accordion-toggle collapsed">
                                            <span class="badge badge-warning" id="label-add"><i class="icon-plus"></i>&nbsp;&nbsp;Додати новий атрибут</span>
                                            <span class="badge badge-warning" id="label-edit" style="display: none"><i class="icon-pencil bigger-130"></i>&nbsp;&nbsp;Редагувати атрибут</span>
                                        </a>
                                    </div>

                                    <div class="accordion-body collapse" id="collapseOne">
                                        <div class="accordion-inner">
                                            <form class="form-horizontal" id="resource-form-attributes" method="POST" action="" />

                                                <div class="control-group">
                                                    <label class="control-label" for="title">Назва атрибута</label>

                                                    <div class="controls">
                                                        <input type="text" required="" name="title" value='' placeholder="Назва атрибута" />
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label" for="type">Тип поля атрибута</label>

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
                                                    <label class="control-label">Багатомовність</label>
                                                    <div class="controls">
                                                        <div class="row-fluid">
                                                            <div class="span3">
                                                                <label>
                                                                    <input name='lang_active' type='hidden' value='0'>
                                                                    <input name='lang_active' class="ace-switch ace-switch-6" type="checkbox" value='1'/>
                                                                    <span class="lbl"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="control-group">
                                                    <label class="control-label">Статус</label>
                                                    <div class="controls">
                                                        <div class="row-fluid">
                                                            <div class="span3">
                                                                <label>
                                                                    <input name='active' type='hidden' value='0'>
                                                                    <input name='active' class="ace-switch ace-switch-6" type="checkbox" value='1'/>
                                                                    <span class="lbl"></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions">
                                                    <button class="btn btn-info resource-add-attribute" type="button">
                                                        <i class="icon-ok bigger-110"></i>
                                                        Сохранить
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-small btn-danger pull-left" data-dismiss="modal">
                            <i class="icon-remove"></i>
                            Close
                        </button>

                    </div>
                </div>
                {{--Модальное окно для дополнительных аттрибутов--}}
                <!--PAGE CONTENT ENDS-->
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->

@stop