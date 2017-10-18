@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            التصنيفات
            <small>عرض التصنيفات</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">التصنيفات</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-header text-right">
            <a href="{{url('categories/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> إضافة تصنيف</a>
        </div>
    </div>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة التصنيفات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>إسم التصنيف </th>
                            <th>الوصف</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cats as $cat)
                            <tr>
                                <td>{{$cat->category}}</td>
                                <td>{{$cat->desc}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('categories/'.$cat->id.'/edit')}}"><i class="fa fa-edit pull-left"></i>تعديل</a></li>
                                            <li><a href="{{url('categories/destroy/'.$cat->id)}}"><i class="fa fa-remove pull-left"></i>حذف</a></li>
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