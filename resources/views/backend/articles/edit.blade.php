@extends('adminpanel')

@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ $url }}/">Головна</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>
    @if(isset($type))
        <li>
            <a href="{{ $url }}/articles/{{ $type }}">{{ $admin_category->getTranslate('title') }}</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
        </li>
    @else
        <li>
            <a href="{{ $url }}/articles/{{ $admin_category->link }}">{{ $admin_category->getTranslate('title') }}</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
        </li>
    @endif

    @if(isset($admin_article))
        <li class="active">{{$admin_article->id}}</li>
    @else
        <li class="active">Додати новий запис</li>
    @endif
@stop

@section('content')

    <div class="page-content">
        <div class="page-header position-relative">
            <h1>
                @if (isset($admin_article))
                    Редагувати
                @else
                    Додати
                @endif
            </h1>
        </div><!--/.page-header-->

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <form class="form-horizontal" id="resource-form" method="POST" action="" />
                @if(isset($attributes_fields))
                    @foreach($attributes_fields as $key => $attribute)
                        @if(!$attribute->lang_active)
                            @if($attribute->type == 'input' )
                                <div class="control-group">
                                    <label class="control-label" for="form-field-2">{{ $key }}</label>
                                    <div class="controls">
                                        <input type="text" id="form-field-2" name='attributes[{{ $key }}]'  value='{{ $attributes -> $key or ''}}'/>
                                    </div>
                                </div>
                            @elseif ($attribute->type == 'textarea' )
                                <h4 class="header blue clearfix">{{ $key }}</h4>
                                <div class="control-group">
                                    <textarea name='attributes["{{ $key }}"]' class="span12" data-id="{{ $key }}" placeholder="Опис">{{ $attributes -> $key or ''}}</textarea>
                                </div>
                            @elseif ($attribute->type == 'textarea-no-wysiwyg' )
                                <h4 class="header blue clearfix">{{ $key }}</h4>
                                <div class="control-group">
                                    <textarea name='attributes["{{ $key }}"]' class="span12 no-wysiwyg" data-id="{{ $key }}" placeholder="Опис">{{ $attributes -> $key or ''}}</textarea>
                                </div>
                            @endif
                        @endif
                    @endforeach
                @endif
                @if($admin_category->hasField('priority'))
                    <div class="control-group">
                        <label class="control-label" for="form-field-2">Пріоритет</label>

                        <div class="controls">
                            <input type="number" id="form-field-2" name="priority" @if(isset($admin_article)) value='{{$admin_article->priority}}' @endif  />
                        </div>
                    </div>
                @endif
                @if($admin_category->hasField('active'))
                    <div class="control-group">
                        <label class="control-label">Статус</label>
                        <div class="controls">
                            <div class="row-fluid">
                                <div class="span3">
                                    <label>
                                        <input name='active' type='hidden' value='0'>
                                        <input name='active' class="ace-switch ace-switch-6" type="checkbox" value=1 @if(isset($admin_article) AND $admin_article->active) checked="checked" @endif />
                                        <span class="lbl"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if($admin_category->hasField('article_parent'))
                    <div class="control-group">
                        <label class="control-label" for="form-field-select-1">Відношення до записів</label>
                        <div class="controls">
                            <select name="article_id" id="form-field-select-1">
                                <option value="">
                                    @foreach($article_group as $article)
                                        </option><option value="{{ $article->id }}" @if(isset($article_id) && ($article_id == $article->id)) selected="selected" @endif>{{ $article->getTranslate('title') }}
                                    @endforeach
                                </option>
                            </select>
                        </div>
                    </div>
                @endif
                @if($admin_category->hasField('date'))
                    <div class="control-group">
                        <label class="control-label" for="id-date-picker-1">Дата</label>
                        <div class="controls">
                            <div class="row-fluid input-append">
                                <input class="span2 date-picker" name="date" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" @if(isset($admin_article)) value='{{date('d-m-Y',strtotime($admin_article->date)) }}' @endif/>
                                <span class="add-on">
                                    <i class="icon-calendar"></i>
                               </span>
                            </div>
                        </div>
                        @endif
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
                                            @if($admin_category->hasField('title'))
                                                <div class="control-group">
                                                    <label class="control-label" for="form-field-3">Назва</label>

                                                    <div class="controls">
                                                        <input type="text" name="title_{{$lang->lang}}" value='@if(isset($admin_article)){{ $admin_article->getTranslate('title', $lang->lang) }}@endif' id="form-field-3" placeholder="Введіть назву" />
                                                    </div>
                                                </div>
                                            @endif

                                            @if(isset($attributes_fields))
                                                @foreach($attributes_fields as $key => $attribute)
                                                   @if($attribute->lang_active)
                                                        @if($attribute->type == 'input' )
                                                            <div class="control-group">
                                                                <label class="control-label" for="form-field-2">{{ $key }}</label>

                                                                <div class="controls">
                                                                    <input type="text" name='attributes[{{ $key }}_{{$lang->lang}}]' value='{{ $attributes -> {$key .'_'. $lang->lang} or ''}}' id="form-field-{{ $key }}" placeholder="{{ $key }}" />
                                                                </div>
                                                            </div>
                                                        @elseif ($attribute->type == 'textarea' )
                                                            <h4 class="header blue clearfix">{{ $key }}</h4>
                                                            <div class="control-group">
                                                                <textarea name='attributes[{{ $key }}_{{$lang->lang}}]' class="span12" id="form-field-{{ $key }}" placeholder="Текст">{{ $attributes -> {$key .'_'. $lang->lang} or ''}}</textarea>
                                                            </div>
                                                        @elseif ($attribute->type == 'textarea-no-wysiwyg' )
                                                            <h4 class="header blue clearfix">{{ $key }}</h4>
                                                            <div class="control-group">
                                                                <textarea name='attributes[{{ $key }}_{{$lang->lang}}]' class="span12 no-wysiwyg" id="form-field-{{ $key }}" placeholder="Текст">{{ $attributes -> {$key .'_'. $lang->lang} or ''}}</textarea>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @endif

                                            @if($admin_category->hasField('meta_title'))
                                                <h4 class="header blue clearfix">SEO</h4>
                                                <div class="control-group">
                                                    <label class="control-label" for="form-field-4">META Title</label>

                                                    <div class="controls">
                                                        <input type="text" id="form-field-4" name="meta_title_{{$lang->lang}}" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_title',$lang->lang) }}@endif"/>

                                                    </div>
                                                </div>
                                            @endif
                                            @if($admin_category->hasField('meta_description'))
                                                <div class="control-group">
                                                    <label class="control-label" for="form-field-5">META Description</label>

                                                    <div class="controls">
                                                        <input type="text" id="form-field-5" name="meta_description_{{$lang->lang}}" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_description',$lang->lang)}}@endif"/>
                                                    </div>
                                                </div>
                                            @endif
                                            @if($admin_category->hasField('meta_keywords'))
                                                <div class="control-group">
                                                    <label class="control-label" for="form-field-tags">META Keywords</label>

                                                    <div class="controls">
                                                        <input type="text" name="meta_keywords_{{$lang->lang}}" class="form-field-tags" value="@if(isset($admin_article)){{ $admin_article->getTranslate('meta_keywords',$lang->lang)}}@endif" placeholder="Введіть ключові слова ..." />
                                                    </div>
                                                </div>
                                            @endif
                                            @if($admin_category->hasField('short_description'))
                                                <h4 class="header blue clearfix">Короткий опис</h4>
                                                <div class="control-group">
                                                    <textarea name="short_description_{{$lang->lang}}"class="span12" id="form-field-8" placeholder="Короткий опис вакансії, новини, слайда і т. д.">@if(isset($admin_article)){{ $admin_article->getTranslate('short_description',$lang->lang) }}@endif</textarea>


                                                </div>
                                            @endif
                                            @if($admin_category->hasField('description'))
                                                <h4 class="header blue clearfix">Текст</h4>
                                                <div class="control-group">
                                                    <textarea name="description_{{$lang->lang}}"class="span12" id="form-field-8" placeholder="Повний опис вакансії, новини, слайда і т. д.">@if(isset($admin_article)){{ $admin_article->getTranslate('description',$lang->lang) }}@endif</textarea>


                                                </div>
                                            @endif

                                        </div>
                                    @endforeach

                                    @if ($admin_category->hasField('gallery'))
                                        @if(isset($admin_article))
                                            <h4 class="header green clearfix">
                                                Gallery
                                            </h4>
                                            <iframe
                                                    frameborder="0"
                                                    src="/js/backend/kcfinder/browse.php?type=images&langCode=ru&homedir=/{{$admin_article->id}}/&config=articles"
                                                    style="width: 100%; height: 400px"
                                                    title="Визуальный файловый браузер"
                                                    tabindex="0"
                                                    allowtransparency="true"></iframe>
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
                                    @endif

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
                        </div><!--<input type="button" class='article-save' value="Сохранить">-->
                        </form>
                        <!--PAGE CONTENT ENDS-->
                    </div><!--/.span-->
            </div><!--/.row-fluid-->
        </div><!--/.page-content-->
        <div id="token" style="display: none">{{csrf_token()}}</div>
@stop

