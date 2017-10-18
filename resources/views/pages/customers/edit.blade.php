@extends('../../layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


    <script src="{{asset('js/update.js')}}"></script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            العملاء
            <small>تعديل عميل</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/customers')}}">العملاء</a></li>
            <li class="active">تعديل عميل</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-body">
        <div>@include('errors.list')</div>
            {!! Form::open(['route' => ['customers.update', $edit->id], 'method' => 'put']) !!}
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
                            <input class="form-control" type="text" name="email" value="{{$edit->email}}">
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
                            <label>كلمة السر</label>
                            <input class="form-control" type="password" name="password" value="{{$edit->password}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="form-group">
                            <label>حاله العميل</label>
                            <select class="form-control" name="status">
                                 <!--must be reviewed -->
                                <option  value="0">نشط</option>
                                <option  value="1">غير نشط</option>
                            </select>
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
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <script src="url('plugins/daterangepicker/daterangepicker.js')"></script>
                            <script src="url('plugins/datepicker/bootstrap-datepicker.js')"></script>
                            <script>
                                $(function () {
                                    $( "#datepicker" ).datepicker();
                                });
                            </script>
                            <input class="form-control cal" type="text" id="datepicker"  name="created_at" value="{{$edit->created_at}}">
                        </div>
                    </div>
                </div>

                <input type="submit" class="btn btn-success pull-left" value="تعديل عميل">

            {!! Form::close() !!}

        </div>
    </div>
    </div>
    @stop