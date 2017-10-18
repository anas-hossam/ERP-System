@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الموردين
            <small>طلب شراء من مورد</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/suppliers')}}">الموردين</a></li>
            <li class="active">طلب شراء من مورد</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">طلب شراء من مورد</h3></div>
                <div class="box-body">
                    <div>@include('errors.list')</div>
                    {!! Form::open(['route' => ['sup_order_pros.sotreSupOrderPros'], 'method' => 'post']) !!}
                    <div class="panel  panel-primary">
                        <div class="panel-heading">
                            بيانات المورد
                        </div>
                        <div class="panel-body">
                            <div class="column">
                                <p style="margin-bottom: 8px;"><div class="heading" style="display: inline-block;"><b>اسم المورد : </b>{{$sup->fname}}{{$sup->lname}}</div>
                                <div style="clear: both; margin-top: 0;"><span class="bold"><b>رقم مورد : </b> </span> {{$sup->id}}</div>
                                </p>
                                <p>
                                    <span class="bold"><b>التليفون : </b></span> {{$sup->phone1}}<br />
                                    <span class="bold"><b>البريد الالكترونى : </b></span> {{$sup->email}}
                                </p>

                                <p style="line-height: 18px;"><span class="bold"><b>تاريخ الاضافة : </b></span> {{$sup->created_at}}<br />
                            </div>
                            <div class="column">
                                <span class="heading"><b>العنوان : </b></span>
                                <p>
                                    {{$sup->address}}
                                </p>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-4">
                            <div class="form-group">
                                <input type="hidden" name="supplier_id" value="{{$sup->id}}">
                                <input type="hidden" name="fname" value="{{$sup->fname}}">
                                <input type="hidden" name="lname" value="{{$sup->lname}}">
                                <label for="pro">منتجات المورد</label>
                                <select class="form-control" id="pro" name="pros">
                                    @foreach($pros as $pro)
                                        <option value="{{$pro->id}}">{{$pro->name}}   {{$pro->buy_price}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success pull-left" value="شراء المنتج">

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@stop