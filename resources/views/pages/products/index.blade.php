@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنتجات
            <small>عرض المنتجات</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li>المنتجات</li>

            <li class="active">عرض المنتجات</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12 col-sm-12">
            <a href="{{url('products/create')}}" class="btn btn-block btn-lg bg-navy margin-bottom"><i class="fa fa-briefcase"></i> اضف منتج جديد</a>
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">عرض المنتجات</h3></div>
                <div class="box-body">
                    <table class="table table-bordered table-hover display" id="example"  cellspacing="0">
                        <thead>
                        <tr>
                            <th>رقم المنتج</th>
                            <th>اسم المنتج</th>
                            <th>الوصف</th>
                            <th>الصورة</th>
                            <th>الباركود</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>رقم المنتج</th>
                            <th>اسم المنتج</th>
                            <th>الوصف</th>
                            <th>الصورة</th>
                            <th>الباركود</th>
                            <th>الخيارات</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($pros as $pro)
                            <tr>
                                <th>{{$pro->id}}</th>
                                <th>{{$pro->name}}</th>
                                <th>{{$pro->desc}}</th>
                                <th><img src="{{$pro->img}}" alt="product{{$pro->id}}" width="100" height="100"></th>
                                <th><i class="fa fa-barcode"></i>{{$pro->parcode}}</th>
                                <th>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('products/'.$pro->id)}}"><i class="fa fa-eye pull-left"></i>عرض</a></li>
                                            <li><hr> </li>
                                            <li><a href="{{url('products/destroy/'.$pro->id)}}"><i class="fa fa-remove pull-left"></i>حذف</a></li>
                                        </ul>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{url('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/js/dataTables.select.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                columnDefs: [ {
//                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                } ],
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                },
                order: [[ 0, 'asc' ]]
            } );
        } );
    </script>
@stop