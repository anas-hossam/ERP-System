@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنفذين
            <small>عرض المنفذين</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">المنفذين</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-header text-right"  style="position: relative;">
            {!! Form::open(['route' => ['executers.import'], 'method' => 'post', 'files' => true]) !!}
            <input type="file" name="import_file" />
            <button class="btn btn-default"><i class="fa fa-upload"></i>استيراد الأسماء كبطاقات csv</button>
            {!! Form::close() !!}
            <br>
            {{--<a href="#" class="btn btn-default"><i class="fa fa-download"></i>  استيراد الأسماء كبطاقات csv</a>--}}
            <a href="{{url('executer/export')}}" class="btn btn-default"><i class="fa fa-download"></i> تصدير الأسماء كبطاقات csv</a>
            <a href="{{url('executers/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> إضافة منفذ جديد</a>
            <a href="{{url('exe_service/')}}" class="btn btn-primary pull-left" style="position: absolute; top: 10px; left: 10px;">
                <i class="fa fa-gears "></i> طلب خدمة من منفذ </a>
            <a href="{{url('executer/archive')}}" class="btn btn-success pull-left"><i class="fa fa-archive"></i> الأرشيف </a>
            {{--<a href="{{url('#')}}" class="btn btn-success pull-left"><i class="fa fa-plus"></i>طلب خدمة من منفذ</a>--}}
        </div>
    </div>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة المنفذين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover display" id="example"  cellspacing="0">
                        <thead>
                        <tr>
                            <th>رقم المنفذ</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>رقم المنفذ</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($exes as $ex)
                            @if($ex->flag==0)
                            <tr>
                                <td>{{$ex->id}}</td>
                                <td>{{$ex->fname." "}}{{$ex->lname}}</td>
                                <td>{{$ex->address}}</td>
                                <td>{{$ex->phone1}}</td>
                                <td>{{$ex->created_at}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('executers/'.$ex->id)}}"><i class="fa fa-eye pull-left"></i>عرض</a></li>
                                            <li><a href="{{url('executers/'.$ex->id.'/edit')}}"><i class="fa fa-edit pull-left"></i>تعديل</a></li>
                                            <li><a href="{{url('executers/archive/'.$ex->id)}}"><i class="fa fa-archive pull-left"></i>نقل للأرشيف</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @endif
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