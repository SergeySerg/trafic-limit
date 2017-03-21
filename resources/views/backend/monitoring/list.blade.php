@extends('adminpanel')


@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ $url }}">Главная</a>
        <span class="divider">
            <i class="icon-angle-right arrow-icon"></i>
        </span>
    </li>
    Мониторинг
   {{-- <li class="active">{{ $monitoring_companies-> name }}</li>--}}
@stop

@section('content')
    <div class="page-content">
        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->
                <div class="row-fluid">

                    <h3 class="header smaller lighter blue">
                        Мониторинг
                    </h3>

                    <div class="table-header">
                        Список кампаний
                        <a href="{{ route('admin_create') }}" class="line_none">
                            <button class="btn btn-warning">
                                <i class="icon-plus"></i>
                                Добавить новый мониторинг
                            </button>
                        </a>
                    </div>
                    <table id="sample-table-2" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th class="center">Название кампании</th>
                            <th class="center">Тип</th>
                            <th class="center">Статус</th>
                            <th class="center">Лимит</th>
                            <th class="center hidden-phone">Сравнение</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($monitoring_companies as $monitoring_company)
                            <tr>
                                <td class="center">
                                    <label>
                                        <span class="lbl">{{ $monitoring_company->id }}</span>
                                    </label>
                                </td>
                                <td class="center">
                                    <a href="{{ $url }}/monitoring/{{ $monitoring_company->id }}"> {{ $monitoring_company->name }} </a>
                                </td>
                                <td  class="center"> {{ ($monitoring_company->type) == 'sales' ? "Продажи" : 'Расход'}} </td>
                                <td class="center">
                                    @if($monitoring_company->reported)
                                        <span class="badge badge-success"><i class="icon-ok bigger-120"></i></span>
                                    @else
                                        <span class="badge badge-important"><i class="icon-remove"></i></span>
                                    @endif
                                </td>
                                <td  class="center"> {{ $monitoring_company->limit }} </td>
                                <td class="center hidden-phone">{{ ($monitoring_company->comparison) ? "Менее" : 'Более' }}</td>
                                <td class="td-actions">
                                    <div class="hidden-phone visible-desktop action-buttons">
                                        <a class="green" href="{{ $url }}/monitoring/{{ $monitoring_company->id }}">
                                            <i class="icon-pencil bigger-130"></i>
                                        </a>

                                        <a href='{{ $url }}/monitoring/{{ $monitoring_company->id }}' data-id='{{ $monitoring_company->id }}' class='resource-delete'>
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
                                                    <a href="{{ $url }}/monitoring/{{ $monitoring_company->id }}" class="tooltip-info" data-rel="tooltip" title="View">
                                                        <span class="blue">
                                                            <i class="icon-zoom-in bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ $url }}/monitoring/{{ $monitoring_company->id }}" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                        <span class="green">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href='{{ $url }}/monitoring/{{ $monitoring_company->id }}' data-id='{{ $monitoring_company->id }}' class='resource-delete' class="tooltip-error" data-rel="tooltip" title="Delete">
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
                    null, null,null, null,null,
                    { "bSortable": false }
                ] } );
        });
    </script>
@stop
