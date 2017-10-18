@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            العملاء
            <small>عرض عميل</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/customers')}}">العملاء</a></li>
            <li class="active">عرض عميل</li>
        </ol>
    </section>
    <br><br>

<div class="row">
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
<div class="col-xs-12 col-sm-8">
    <a href="{{url('order/'.$show->id.'/edit')}}" class="btn btn-block btn-lg bg-navy margin-bottom"><i class="fa fa-plus"></i> طلب منتج</a>
    <div class="box box-primary">
        <div class="box-header with-border"><h3 class="box-title">عرض عميل</h3></div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>رقم</th>
                    <th>اسم العميل</th>
                    <th>البريد الالكترونى</th>
                    <th>تليفون</th>
                    <th>تليفون آخر</th>
                    <th>العنوان</th>
                    <th>اسم المستخدم</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{$show->id}}</th>
                    <th>{{$show->fname}} {{$show->lname}}</th>
                    <th>{{$show->email}}</th>
                    <th>{{$show->phone1}}</th>
                    <th>{{$show->phone2}}</th>
                    <th>{{$show->address}}</th>
                    <th>{{$show->username}}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="box box-primary">
            <div class="box-header with-border"><h3 class="box-title">متابعة المشاريع</h3></div>
        </div>
        @foreach($cusServs as $serv)
        <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-tasks"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{$serv->name}}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description">تم الانتهاء من {{$serv->projects_follow}}  من المشروع</span>
            </div>
        </div>
            @endforeach

    </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12">

            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">قائمة العروض</h3></div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>رقم العرض</th>
                            <th>اسم العميل</th>
                            <th>تاريخ العرض</th>
                            <th>حاله العرض</th>
                            <th>السعر</th>
                            {{--<th>عرض</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($offers as $offer)
                        <tr>
                            <th>{{$offer->id}}</th>
                            <th>{{$show->fname}}</th>
                            <th>{{$offer->created_at}}</th>
                            <th>{{$offer->status}}</th>
                            <th>{{$offer->tot_price}}</th>
                            {{--<td><a href="{{url('bills/'.$offer->id)}}" ><i class="fa fa-eye"></i></a></td>--}}
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">قائمة الفواتير</h3></div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>رقم الفاتورة</th>
                            <th>اسم العميل</th>
                            <th>تاريخ الفاتورة</th>
                            <th>حاله الفاتورة</th>
                            <th>السعر</th>
                            {{--<th>عرض</th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)
                        <tr>
                            <th>{{$bill->id}}</th>
                            <th>{{$show->fname}}</th>
                            <th>{{$bill->created_at}}</th>
                            <th>{{$bill->status}}</th>
                            <th>{{$bill->tot_price}}</th>
                            {{--<td><a href="{{url('estimates/'.$bill->id)}}" ><i class="fa fa-eye"></i></a></td>--}}
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    @stop