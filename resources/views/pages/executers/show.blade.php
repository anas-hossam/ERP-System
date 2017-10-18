@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنفذين
            <small>عرض منفذ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/executers')}}">المنفذين</a></li>
            <li class="active">عرض منفذ</li>
        </ol>
    </section>
    <br><br>

    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <a href="{{url('/services/'.$show->id)}}" class="btn btn-block btn-lg bg-navy margin-bottom"><i class="fa fa-folder-open"></i> قائمة الخدمات</a>
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">عرض منفذ</h3></div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th> رقم المنفذ</th>
                            <th>الاسم الاول</th>
                            <th>الاسم الثانى</th>
                            <th>البريد الالكترونى</th>
                            <th>تليفون</th>
                            <th>تليفون آخر</th>
                            <th>العنوان</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>{{$show->id}}</th>
                            <th>{{$show->fname}}</th>
                            <th>{{$show->lname}}</th>
                            <th>{{$show->email}}</th>
                            <th>{{$show->phone1}}</th>
                            <th>{{$show->phone2}}</th>
                            <th>{{$show->address}}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop