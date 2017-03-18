@extends('adminpanel')

@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ $url }}">Головна</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>

    <li>
        <a href="#">Резюме</a>

        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>

    @if(isset($admin_resume))
        <li class="active">{{$admin_resume->name}}</li>
    @endif
@stop

@section('content')

    <div class="page-content">
        <div class="page-header position-relative hidden-print">
            <h1>
                Детальний перегляд резюме
            </h1>

        </div><!--/.page-header-->

        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->

                <div class="profile-user-info profile-user-info-striped">
                    <div class="profile-info-row">
                        <div class="profile-info-name"> ПІП </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->name)
                               <span class="editable" id="name">{{$admin_resume->name}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif

                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Дата народження </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->date_birthday && ($admin_resume->date_birthday !== '0000-00-00 00:00:00'))
                                <span class="editable" id="date_birthday">
                                    {{date('d-m-Y',strtotime($admin_resume->date_birthday))}}
                                </span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Адреса проживання </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->home)
                                 <span class="editable" id="home">{{$admin_resume->home}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Мобільний телефон </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->telephone)
                                <span class="editable" id="telephone">{{$admin_resume->telephone}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Домашній телефон </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->home_telephone)
                                 <span class="editable" id="home_telephone">{{$admin_resume->home_telephone}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Освіта </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->education)
                                <span class="editable" id="education">{{$admin_resume->education}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Спеціальність </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->specialty)
                                <span class="editable" id="specialty">{{$admin_resume->specialty}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Досвід роботи </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->experience)
                                <span class="editable" id="experience">{{$admin_resume->experience}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif

                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Володіння електроінстр. </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->possession)
                                <span class="editable" id="possession">{{$admin_resume->possession}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name"> Бажаний рівень ЗП </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->salary)
                                <span class="editable" id="salary">{{$admin_resume->salary}}</span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>

                    <div class="profile-info-row hidden-print">
                        <div class="profile-info-name"> Готове резюме </div>

                        <div class="profile-info-value">
                            @if($admin_resume && $admin_resume->files)
                                <span class="editable" id="salary"><a href="{{ asset('/'.$admin_resume->files) }}">Завантажити резюме <i class="icon-download"></i></a></span>
                            @else <span style="color: lightgrey"> Не вказано </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-actions hidden-print">
                    <a href='{{ $url }}/resume'>
                        <div class="btn btn-info">Повернутися до списку всіх резюме</div>
                    </a>
                    <button style="float: right" class="btn btn-app btn-light btn-mini" onclick="window.print();">
                        <i class="icon-print bigger-160"></i>
                        Print
                    </button>
                </div>
                <div class="space-4"></div>

                <!--PAGE CONTENT ENDS-->
            </div>   <!--/.span-->
        </div><!--/.row-fluid-->
    </div><!--/.page-content-->
@stop

