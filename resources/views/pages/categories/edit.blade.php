@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            التصنيفات
            <small>تعديل تصنيف</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/categories')}}">التصنيفات</a></li>
            <li class="active">تعديل تصنيف</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-body">
            <div>@include('errors.list')</div>
            {!! Form::open(['route' => ['categories.update', $edit->id], 'method' => 'put']) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>إسم التصنيف</label>
                        <input class="form-control" type="text" name="category" value="{{$edit->category}}" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>الوصف</label>
                        <input class="form-control" type="text" name="desc" value="{{$edit->desc}}">
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-success pull-left" value="تعديل تصنيف">

            {!! Form::close() !!}


        </div>
    </div>
@stop