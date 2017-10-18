@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الأسعار
            <small>عرض الأسعار</small>
            <small>عرض سعر</small>
            <small>تعديل سعر</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/estimates')}}">عرض الأسعار</a></li>
            <li><a href="{{url('/estimates/'.$edit->id)}}">عرض سعر</a></li>
            <li class="active">تعديل سعر</li>
        </ol>
    </section>
    <br><br>
    <div class="row">
        <div class="col-xs-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border"><h3 class="box-title">تعديل سعر</h3></div>
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
                                    <span class="bold"><b>رقم السعر : </b></span> {{$edit->id}}<br />
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
                <div class="clearfix"></div>
                <div>@include('errors.list')</div>
                {!! Form::open(['route' => ['estimates.update', $edit->id], 'method' => 'put']) !!}
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>الحالة</th>
                        <th>المنتج</th>
                        <th>الكمية</th>
                        <th>الوحدة</th>
                        <th>سعر الوحدة</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th>
                                <select class="form-control"  name="status">
                                    @if($edit->status=="مفتوح")
                                    <option value="مفتوح">مفتوح</option>
                                    <option value="مغلق">مغلق</option>
                                        @else
                                        <option value="مغلق">مغلق</option>
                                        <option value="مفتوح">مفتوح</option>
                                        @endif
                                </select>
                        </th>
                        <th>
                            <input type="hidden"  name="cusId" value="{{$cus->id}}">
                                <select class="form-control" id="pro" name="products">
                                    @foreach($pros as $pro)
                                        <option value="{{$pro->name}}">{{$pro->name}}</option>
                                    @endforeach
                                </select>
                        </th>
                        <th>
                            <div class="form-group">
                                <input type="text" name="quantity" class="form-control" value="{{$edit->quantity}}">
                            </div>
                        </th>
                        <th>
                            <div class="form-group">
                                <input type="text" name="unit" class="form-control" value="{{$edit->unit}}">
                            </div>
                        </th>
                        <th>
                            <div class="form-group " >
                                <input type="text" name="unit_price" class="form-control" value="{{$edit->unit_price}}" placeholder="$">
                            </div>
                        </th>

                        <div class="clearfix"></div>


                    </tr>
                    </tbody>
                </table>
                <div class="form-group">
                    <input type="submit" class="btn btn-success pull-left" value="تعديل منتج">
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
@stop