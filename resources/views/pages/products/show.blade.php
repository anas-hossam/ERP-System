@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنتجات
            <small>عرض المنتجات</small>
            <small>عرض منتج</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/products')}}">المنتجات</a></li>
            <li class="active">عرض منتج</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">عرض منتج</h3></div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>رقم</th>
                            <th>الإسم</th>
                            <th>التصنيف</th>
                            <th>الوصف</th>
                            <th>الصورة</th>
                            <th>الوحدة</th>
                            <th>سعر التكلفة</th>
                            <th>سعر الشراء</th>
                            <th>الباركود</th>
                            <th>تعديل</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{$show->id}}</th>
                                <th>{{$show->name}}</th>
                                <th>{{$catName}}</th>
                                <th>{{$show->desc}}</th>
                                <th><img src="../{{$show->img}}" alt="product{{$show->id}}" width="200" height="200"></th>
                                <th>{{$show->unit}}</th>
                                <th>{{$show->cost_price}}</th>
                                <th>{{$show->buy_price}}</th>
                                <th><i class="fa fa-barcode"></i>{{$show->parcode}}</th>
                                <th>
                                    <a href="{{url('products/'.$show->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop