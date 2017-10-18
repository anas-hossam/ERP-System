@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الطلبات
            <small>عرض الطلبات</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">الطلبات</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary" >
        <div class="box-header text-right" style="position: relative;">
            <a href="{{url('estimates')}}" class="btn btn-primary"><i class="fa fa-money"></i> عرض الأسعار </a>
            <a href="{{url('bills')}}" class="btn btn-primary pull-left" style="position: absolute; top: 10px; left: 10px;">
                <i class="fa fa-check-circle-o "></i> الفواتير </a>
        </div>
    </div>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة الطلبات</h3>

                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover display" id="example"  cellspacing="0">
                        <thead>
                        <tr>
                            <th>الاسم</th>
                            <th>البريد الالكترونى</th>
                            <th>موقع المشروع</th>
                            <th>نوع البناء</th>
                            <th>نوع رسم التصميم</th>
                            <th>الميزانية</th>
                            <th>فريق عمل</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->email}}</td>
                                    <td>{{$order->country." "}}{{$order->city." "}}{{$order->street}}</td>
                                    <td>{!!(!empty($order->res_build))?implode(" ",unserialize($order->res_build)):""!!}{!!(!empty($order->comm_build))?implode(" ",unserialize($order->comm_build)):""!!}{!!(!empty($order->pub_build))?implode(" ",unserialize($order->pub_build)):""!!}{{$order->others}}</td>
                                    <td>{!!implode(" ",unserialize($order->des_draw))!!}</td>
                                    <td>{{$order->budget}}</td>
                                    <td>{!!implode(" ",unserialize($order->team_need))!!}</td>
                                </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div>
    <!-- /.row -->
@stop
@section('script')
    <script src="{{url('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/js/dataTables.select.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            var table=$('#example').DataTable( {
                columnDefs: [ {
                    // orderable: false,
                    className: 'select-checkbox',
                    //targets:   0
                } ],

                select: {
                    style:    'os',
                    className: 'row-selected',
                    selector: 'td:first-child'

                },
                order: [[ 0, 'asc' ]],
            } );
        } );

    </script>
@stop