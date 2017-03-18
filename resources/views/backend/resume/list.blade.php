@extends('adminpanel')


@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ route('admin_dashboard') }}">Головна</a>

                                    <span class="divider">
                                        <i class="icon-angle-right arrow-icon"></i>
                                    </span>
    </li>

    <li class="active">Резюме</li>
@stop

@section('content')

    <div class="page-content">
        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->
                <div class="row-fluid">
                    <h3 class="header smaller lighter blue">Резюме</h3>

                    <div class="table-header">
                        Список поданих резюме
                    </div>
                    <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>

                            <th class="center">
                                ID
                            </th>
                            <th class="hidden-phone center">
                                ПІБ
                            </th>
                            <th class="hidden-phone center">
                                Дата подачі резюме
                            </th>
                            <th class="hidden-phone center">
                                Основна спеціальність
                            </th>
                            <th class="hidden-phone center">
                                Бажаний рівень ЗП
                            </th>
                            <th class="hidden-phone center">
                                Контактний номер телефону
                            </th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($admin_all_resume as $admin_resume)
                            <tr>
                                <td class="center">
                                    <label>
                                        <span class="lbl">{{ $admin_resume->id }}</span>
                                    </label>
                                </td>
                                <td> <a href="{{ $url }}/resume/{{$admin_resume->id}}">{{ $admin_resume->name }}</a></td>
                                <td>{{date('d-m-Y',strtotime($admin_resume->created_at))}}</td>
                                <td>{{ $admin_resume->specialty }}</td>
                                <td>{{ $admin_resume->salary }}</td>
                                <td>{{ $admin_resume->telephone }}</td>
                                <td class="td-actions">
                                    <div class="visible-phone visible-desktop action-buttons">
                                        <a class="green" href="{{ $url }}/resume/{{$admin_resume->id}}">
                                            <i class="icon-pencil bigger-130"></i>
                                        </a>
                                        <a href='{{ $url }}/resume/{{ $admin_resume->id}}' data-id='{{$admin_resume->id}}' class='resource-delete'>
                                            <i class="icon-trash bigger-130"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

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
                    null, null,null, null,null,
                    { "bSortable": false }
                ] } );
        });
    </script>
@stop