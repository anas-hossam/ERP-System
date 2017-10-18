@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الأسعار
            <small>عرض الأسعار</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">عرض الأسعار</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12 col-sm-12">
            <a href="{{url('estimates/create')}}" class="btn btn-block btn-lg bg-navy margin-bottom"><i class="fa fa-plus"></i> اضف سعر</a>
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">عرض الأسعار</h3></div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>الحالة</th>
                            <th>رقم</th>
                            <th>رقم العميل</th>
                            <th>تاريخ الاضافة</th>
                            <th>السعر الكلى ($)</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offs as $off)
                            <tr>
                                <th>{{$off->status}}</th>
                                <th>{{$off->id}}</th>
                                <th>{{$off->customer_id}}</th>
                                <th>{{$off->created_at}}</th>
                                <th>{{$off->tot_price}}</th>
                                <th>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('estimates/'.$off->id)}}"><i class="fa fa-eye pull-left"></i>عرض</a></li>
                                            <li><hr> </li>
                                            <li><a href="{{url('estimates/destroy/'.$off->id)}}"><i class="fa fa-remove pull-left"></i>حذف</a></li>
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