@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنفذين
            <small>عرض منفذ</small>
            <small>اضافة خدمه</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/executers')}}">المنفذين</a></li>
            <li><a href="{{url('/executers/'.$id)}}">عرض منفذ</a></li>
            <li class="active">ااضافة خدمه</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-body">
            <div>@include('errors.list')</div>
            {!! Form::open(['route' => ['services.store'], 'method' => 'post']) !!}
            <div class="row">
                <input type="hidden" name="executer_id" value="{{$id}}" >
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>اسم الخدمة</label>
                        <input class="form-control" type="text" name="name" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>نوع الخدمة</label>
                        <input class="form-control" type="text" name="type" >
                    </div>
                </div>

                <div class="col=xs-12 col-sm-4 col-lg-4">
                    <label for="cus">قائمة العملاء</label>
                    <select class="form-control" id="cus" name="customers">
                        @foreach($cus as $cu)
                            <option value="{{$cu->id}}">{{$cu->fname}}{{$cu->lname}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>السعر</label>
                        <input class="form-control" type="text" name="price">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-6">
                    <div class="form-group">
                        <label>متابعة المشاريع (نسبة مئوية)</label>
                        <input class="form-control" type="text" name="projects_follow">تم انجازه
                    </div>
                </div>

            <input type="submit" class="btn btn-success pull-left" value="اضافة خدمة">

            {!! Form::close() !!}


        </div>
    </div>
    </div>
@stop