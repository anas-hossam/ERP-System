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
        <div class="col-xs-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">طلب خدمة من منفذ</h3></div>
                <div class="box-body">
                    <div>@include('errors.list')</div>
                    {!! Form::open(['route' => ['exe_service_store.storeExecService'], 'method' => 'post']) !!}
                    <div class="panel  panel-primary">
                        <div class="panel-heading">
                            بيانات المنفذ
                        </div>
                        <div class="panel-body">
                            <div class="column">
                                <p style="margin-bottom: 8px;"><div class="heading" style="display: inline-block;"><b>اسم المنفذ : </b>{{$exe->fname}}{{$exe->lname}}</div>
                                <div style="clear: both; margin-top: 0;"><span class="bold"><b>رقم المنفذ : </b> </span> {{$exe->id}}</div>
                                </p>
                                <p>
                                    <span class="bold"><b>التليفون : </b></span> {{$exe->phone1}}<br />
                                    <span class="bold"><b>البريد الالكترونى : </b></span> {{$exe->email}}
                                </p>

                                <p style="line-height: 18px;"><span class="bold"><b>تاريخ الاضافة : </b></span> {{$exe->created_at}}<br />
                            </div>
                            <div class="column">
                                <span class="heading"><b>العنوان : </b></span>
                                <p>
                                    {{$exe->address}}
                                </p>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-4">
                            <div class="form-group">
                                <input type="hidden" name="executer_id" value="{{$exe->id}}">
                                <input type="hidden" name="fname" value="{{$exe->fname}}">
                                <input type="hidden" name="lname" value="{{$exe->lname}}">
                                <label for="ser">خدمات المنفذ</label>
                                <select class="form-control" id="ser" name="servs">
                                    @foreach($servs as $serv)
                                        <option value="{{$serv->id}}">{{"الاسم : ".$serv->name." النوع : "}}{{$serv->type." السعر :  "}}{{$serv->price." وقت التنفيذ :  "}}{{$serv->executing_time}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success pull-left" value="طلب الخدمة">

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@stop