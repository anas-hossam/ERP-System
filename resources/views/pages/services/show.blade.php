@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنفذين
            <small>عرض المنفذين</small>
            <small>عرض منفذ</small>
            <small>قائمة الخدمات</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/executers')}}">المنفذين</a></li>
            <li><a href="{{url('/executers/'.$id)}}">عرض منفذ</a></li>
            <li class="active">قائمة الخدمات</li>
        </ol>
    </section>
    <br><br>
    <a href="{{url('/services/'.$id.'/edit')}}" class="btn btn-block btn-lg bg-navy margin-bottom"><i class="fa fa-plus"></i> اضافة خدمة</a>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة الخدمات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>رقم الخدمه</th>
                            {{--<th>رقم المنفذ</th>--}}
                            <th>اسم الخدمة</th>
                            <th>النوع</th>
                            <th>السعر</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($servs as $serv)
                            <tr>
                                <td>{{$serv->id}}</td>
                                {{--<td>{{$serv->executer_id}}</td>--}}
                                <td>{{$serv->name}}</td>
                                <td>{{$serv->type}}</td>
                                <td>{{$serv->price}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
@stop