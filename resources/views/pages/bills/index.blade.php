@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الفواتير
            <small>عرض الفواتير</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">الفواتير</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <a href="{{url('bills/create')}}" class="btn btn-block btn-lg bg-navy margin-bottom"><i class="fa fa-plus"></i> أضف فاتورة</a>
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">عرض الفواتير</h3></div>
                <div class="box-body">
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
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
                        @foreach($bills as $bill)
                            <tr>
                                <th>{{$bill->status}}</th>
                                <th>{{$bill->id}}</th>
                                <th>{{$bill->customer_id}}</th>
                                <th>{{$bill->created_at}}</th>
                                <th>{{($bill->status=="تم الدفع")?0:$bill->tot_price}}</th>
                                <th>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('bills/'.$bill->id)}}"><i class="fa fa-eye pull-left"></i>عرض</a></li>
                                            <hr>
                                            <li><a href="{{url('bills/destroy/'.$bill->id)}}"><i class="fa fa-remove pull-left"></i>حذف</a></li>
                                            <hr>
                                            <li><a href="{{url('bill/export/'.$bill->id)}}"><i class="fa fa-download pull-left"></i>حفظ ك pdf</a></li>

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