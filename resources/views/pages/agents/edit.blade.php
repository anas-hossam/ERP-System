@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            وكلاء البيع
            <small>عرض وكلاء البيع</small>
            <small>تعديل وكيل بيع</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/agents')}}">وكلاء البيع</a></li>
            <li class="active">تعديل وكيل بيع</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-body">
            <div>@include('errors.list')</div>

            {!! Form::open(['route' => ['agents.update', $edit->id], 'method' => 'put']) !!}
                <div class="row">

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>الاسم الاول</label>
                            <input class="form-control" type="text" name="fname" value="{{$edit->fname}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>الاسم الثاني</label>
                            <input class="form-control" type="text" name="lname" value="{{$edit->lname}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>البريد الالكتروني</label>
                            <input class="form-control" type="email" name="email" value="{{$edit->email}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>اسم المستخدم</label>
                            <input class="form-control" type="text" name="username" value="{{$edit->username}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>التليفون</label>
                            <input class="form-control" type="tel" name="phone1" value="{{$edit->phone1}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>تليفون آخر</label>
                            <input class="form-control" type="tel" name="phone2" value="{{$edit->phone2}}">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>العنوان</label>
                            <input class="form-control" type="search" name="address" value="{{$edit->address}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>تاريخ الاضافة</label>
                            <input class="form-control" type="text" name="created_at" value="{{$edit->created_at}}">
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-success pull-left" value="تعديل وكيل بيع">

            {!! Form::close() !!}

        </div>
    </div>
    </div>
    @stop