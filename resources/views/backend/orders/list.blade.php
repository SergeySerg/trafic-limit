@extends('adminpanel')


@section('breadcrumbs')
    <li>
        <i class="icon-home home-icon"></i>
        <a href="{{ route('admin_dashboard') }}">Головна</a>

                                    <span class="divider">
                                        <i class="icon-angle-right arrow-icon"></i>
                                    </span>
    </li>

    <li class="active">Зворотній зв'язок</li>
@stop

@section('content')

    <div class="page-content">
        <div class="row-fluid">
            <div class="span12">
                <!--PAGE CONTENT BEGINS-->
                <div class="row-fluid">
                    <h3 class="header smaller lighter blue">Зворотній зв'язок</h3>

                    <div class="table-header">
                        Список вхідних повідомлень
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
                                Контактний номер телефону
                            </th>
                            <th class="hidden-phone center">
                                Тематика
                            </th>
                            <th class="hidden-phone center">
                                Дата надходження
                            </th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($admin_orders as $admin_order)
                            <tr>
                                <td class="center">
                                    <label>
                                        <span class="lbl">{{ $admin_order->id }}</span>
                                    </label>
                                </td>
                                <td>{{ $admin_order->name }}</td>
                                <td>{{ $admin_order->phone }}</td>
                                <td>{!! $admin_order->type !!}</td>
                                <td>{{ $admin_order->created_at }}</td>
                                <td class="td-actions">
                                    <div class="visible-phone visible-desktop action-buttons">
                                        <a class="green" href="{{ $url }}/resume/{{$admin_order->id}}">
                                            <i class="icon-pencil bigger-130"></i>
                                        </a>
                                        <a href='{{ $url }}/orders/{{ $admin_order->id}}' data-id='{{ $admin_order->id }}' class='resource-delete'>
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
                "aaSorting": [[5,'desc']],
                "aoColumns": [
                    { "bSortable": false },
                    null, null,null, null,
                    { "bSortable": false }
                ] } );
        });
    </script>
@stop