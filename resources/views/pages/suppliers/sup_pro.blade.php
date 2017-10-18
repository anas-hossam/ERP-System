@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الموردين
            <small>عرض مورد</small>
            <small>منتجات مورد</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/suppliers')}}">الموردين</a></li>
            <li><a href="{{url('/sup_product/'.$id)}}">عرض مورد</a></li>
            <li class="active">منتجات مورد</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <a href="{{url('/add_sup_pro/'.$id)}}" class="btn btn-block btn-lg bg-navy margin-bottom"><i class="fa fa-briefcase"></i> اضف منتج جديد</a>
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">عرض منتجات مورد</h3></div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>رقم المنتج</th>
                            <th>اسم المنتج</th>
                            <th>الوحدة</th>
                            <th>السعر</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sup_pro as $sup)
                        <tr>
                            <th>{{$sup->id}}</th>
                            <th>{{$sup->name}}</th>
                            <th>{{$sup->unit}}</th>
                            <th>{{$sup->buy_price}}</th>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @stop