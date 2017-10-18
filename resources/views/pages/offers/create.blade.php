@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الأسعار
            <small>عرض الأسعار</small>
            <small>اضافة سعر</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/estimates')}}">عرض الأسعار</a></li>
            <li class="active">اضافه سعر</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-body">
            <div>@include('errors.list')</div>
            {!! Form::open(['route' => ['estimates.store'], 'method' => 'post']) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <label for="pro">الحالة</label>
                    <select class="form-control" id="pro" name="status">
                            <option value="مفتوح">مفتوح</option>
                        <option value="مغلق">مغلق</option>
                    </select>
                </div>
                <div class="col=xs-12 col-sm-4 col-lg-4">
                    <label for="cus">قائمة العملاء</label>
                    <select class="form-control" id="cus" name="customers">
                        @foreach($cus as $cu)
                            <option value="{{$cu->id}}">{{$cu->fname}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col=xs-12 col-sm-4 col-lg-4">
                    <label for="pro">قائمة المنتجات</label>
                    <select class="form-control" id="pro" name="products">
                        @foreach($pros as $pro)
                            <option value="{{$pro->name}}">{{$pro->name}}</option>
                        @endforeach
                    </select>
                </div>



            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>الكمية</label>
                    <input class="form-control" type="number" name="quantity">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>الوحدة</label>
                    <input class="form-control" type="text" name="unit">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>سعر الوحدة</label>
                    <input class="form-control" type="text" name="unit_price" placeholder="$" >
                </div>
            </div>


        </div>

        <input type="submit" class="btn btn-success pull-left" value="اضافة سعر">
        </div>

        {!! Form::close() !!}


    </div>
@stop