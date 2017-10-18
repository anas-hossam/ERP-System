@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            وكلاء البيع
            <small>عرض وكلاء البيع</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">وكلاء البيع</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-header text-right">
            <a href="{{url('agents/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> إضافة وكيل بيع</a>
        </div>
        </div>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة وكلاء البيع</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover display" id="example"  cellspacing="0">
                        <thead>
                        <tr>
                            <th>رقم الوكيل</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>رقم الوكيل</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($agents as $agent)
                        <tr>
                            <td>{{$agent->id}}</td>
                            <td>{{$agent->username}}</td>
                            <td>{{$agent->address}}</td>
                            <td>{{$agent->phone1}}</td>
                            <td>{{$agent->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('agents/'.$agent->id.'/edit')}}"><i class="fa fa-edit pull-left"></i>تعديل</a></li>
                                        <hr>
                                        <li><a href="{{url('agents/destroy/'.$agent->id)}}"><i class="fa fa-remove pull-left"></i>حذف</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
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