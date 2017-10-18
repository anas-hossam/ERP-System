@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنتجات
            <small>تعديل منتج</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/products')}}">المنتجات</a></li>
            <li><a href="{{url('/products/'.$edit->id)}}">عرض منتج</a></li>
            <li class="active">تعديل منتج</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-body">
            <div>@include('errors.list')</div>
            {!! Form::open(['route' => ['products.update', $edit->id], 'method' => 'put', 'files' => true]) !!}
            <div class="row">
                {{--<input type="hidden" name="supplier_id" value="{{$id}}">--}}
                <div class="col-xs-12 col-sm-4 col-lg-4">
                    <div class="form-group">
                        <label>الاسم</label>
                        <input class="form-control" type="text" name="name" value="{{$edit->name}}">
                    </div>
                </div>
                <div class="col=xs-12 col-sm-4 col-lg-4">
                    <label for="cat">قائمة التصنيفات</label>
                    <select class="form-control" id="cat" name="cats">
                        @foreach($cats as $ca)
                            <option value="{{$ca->id}}">{{$ca->category}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col=xs-12 col-sm-4 col-lg-4">
                    <label for="sup">قائمة الموردين</label>
                    <select class="form-control" id="sup" name="sups">
                        @foreach($sups as $su)
                            <option value="{{$su->id}}">{{$su->fname}} {{$su->lname}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="form-group">
                    <label>الوصف</label>
                    <textarea name="desc" class="form-control" >{{$edit->desc}}</textarea>
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>الصورة</label>
                    <input class="form-control" type="file" name="img" value="{{$edit->img}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>الوحدة</label>
                    <input class="form-control" type="text" name="unit" value="{{$edit->unit}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>سعر التكلفة</label>
                    <input class="form-control" type="text" name="cost_price" value="{{$edit->cost_price}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>سعر الشراء</label>
                    <input class="form-control" type="text" name="buy_price" value="{{$edit->buy_price}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>الباركود</label>
                    <input class="form-control" type="text" name="parcode" value="{{$edit->parcode}}">
                </div>
            </div>
        </div>

        <input type="submit" class="btn btn-success pull-left" value="تعديل منتج">

        {!! Form::close() !!}


    </div>
    </div>
@stop