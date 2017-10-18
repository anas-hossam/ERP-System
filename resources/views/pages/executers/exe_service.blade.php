@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنفذين
            <small>طلب خدمة من منفذ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/executers')}}">المنفذين</a></li>
            <li class="active">طلب خدمة من منفذ</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">طلب خدمة من منفذ</h3></div>
                <div class="box-body">
                    <div>@include('errors.list')</div>
                    {!! Form::open(['route' => ['exe_service.exeService'], 'method' => 'post']) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-4">
                            <div class="form-group">
                                <label for="sup">اسم المنفذ</label>
                                <select class="form-control" id="exe" name="exes">
                                    @foreach($exes as $exe)
                                        <option value="{{$exe->id}}">{{$exe->fname." "}} {{$exe->lname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success pull-left" value="اختيار">

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@stop