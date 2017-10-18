@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الموردين
            <small>عرض الموردين</small>
            <small>الأرشيف</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/suppliers')}}">الموردين</a></li>
            <li class="active">الأرشيف</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">الأرشيف</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>رقم المورد</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suppliers as $sup)
                            @if($sup->flag==1)
                                <tr>
                                    <td>{{$sup->id}}</td>
                                    <td>{{$sup->fname}} {{$sup->lname}}</td>
                                    <td>{{$sup->address}}</td>
                                    <td>{{$sup->phone1}}</td>
                                    <td>{{$sup->created_at}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{url('suppliers/'.$sup->id)}}"><i class="fa fa-eye pull-left"></i>عرض</a></li>
                                                <li><a href="{{url('suppliers/'.$sup->id.'/edit')}}"><i class="fa fa-edit pull-left"></i>تعديل</a></li>
                                                <li><a href="{{url('suppliers/unarchive/'.$sup->id)}}"><i class="fa fa-inbox pull-left"></i>استرجاع</a></li>
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