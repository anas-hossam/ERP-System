@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الأسعار
            <small>عرض الأسعار</small>
            <small>عرض سعر</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/estimates')}}">عرض الأسعار</a></li>
            <li class="active">عرض سعر</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">عرض سعر</h3></div>
                <div class="box-body">
                    <div class="panel  panel-primary">
                        <div class="panel-heading">
                            بيانات العميل
                        </div>
         <div class="panel-body">
             <div class="column">
                 <p style="margin-bottom: 8px;"><div class="heading" style="display: inline-block;"><b>اسم العميل : </b>{{$cusName}}</div>
                 <div style="clear: both; margin-top: 0;"><span class="bold"><b>رقم العميل : </b> </span> {{$cus->id}}</div>
                 </p>
                 <p>
                     <span class="bold"><b>التليفون : </b></span> {{$cus->phone1}}<br />
                     <span class="bold"><b>البريد الالكترونى : </b></span> {{$cus->email}}
                 </p>

                 <p style="line-height: 18px;"><span class="bold"><b>تاريخ الاضافة : </b></span> {{$cus->created_at}}<br />
                     <span class="bold"><b>رقم السعر : </b></span> {{$show->id}}<br />
             </div>
             <div class="column">
                 <span class="heading"><b>العنوان : </b></span>
                 <p>
                     {{$cus->address}}
                 </p>
             </div>
         </div>


                    </div>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>المنتج</th>
                            <th>الكمية</th>
                            <th>الوحدة</th>
                            <th>سعر الوحدة</th>
                            <th> السعر الكلى ($)</th>
                            <th>تعديل</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{$show->desc}}</th>
                                <th>{{$show->quantity}}</th>
                                <th>{{$show->unit}}</th>
                                <th>{{$show->unit_price}}</th>
                                <th>{{$show->tot_price}}</th>
                                <th>
                                    <a href="{{url('estimates/'.$show->id.'/edit')}}"><i class="fa fa-edit"></i></a>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop