@extends('../../layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            المنفذين
            <small>اضافة منفذ</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/executers')}}">المنفذين</a></li>
            <li class="active">اضافة منفذ</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-body">
            <div>@include('errors.list')</div>
            {!! Form::open(['route' => ['executers.store'], 'method' => 'post']) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>الاسم الاول</label>
                        <input class="form-control" type="text" name="fname" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>الاسم الثاني</label>
                        <input class="form-control" type="text" name="lname" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <input class="form-control" type="text" name="email">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>التليفون</label>
                        <input class="form-control" type="tel" name="phone1" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>تليفون آخر</label>
                        <input class="form-control" type="tel" name="phone2" >
                    </div>
                </div>

                {{--<div class="col-xs-12 col-sm-6 col-lg-4">--}}
                    {{--<div class="form-group">--}}
                        {{--<label>العنوان</label>--}}
                        {{--<input class="form-control" type="search" name="address" >--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>

            <!-- google map -->
            <div class="row"><br><br>
                <div class="col-xs-12 col-sm-12 col-lg-8 pull-left" id="mymap" style="height: 300px;"></div>
                <div class="col-xs-12 col-sm-12 col-lg-4">
                    <div class="form-group">
                        <label>العنوان</label>
                        <input id="address" class=" form-control" name="address" type="textbox"  value="Sydney, NSW"><br>
                        <input id="submitsearch" class="form-control btn btn-success pull-left" type="button" value="بحث فى خريطة جوجل"><br>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('mymap'), {
                        zoom: 8,
                        center: {lat: -34.397, lng: 150.644}
                    });
                    var geocoder = new google.maps.Geocoder();

                    document.getElementById('submitsearch').addEventListener('click', function() {
                        geocodeAddress(geocoder, map);
                    });
                }

                function geocodeAddress(geocoder, resultsMap) {
                    var address = document.getElementById('address').value;
                    geocoder.geocode({'address': address}, function(results, status) {
                        if (status === 'OK') {
                            resultsMap.setCenter(results[0].geometry.location);
                            var marker = new google.maps.Marker({
                                map: resultsMap,
                                position: results[0].geometry.location
                            });
                        } else {
                            alert('Geocode was not successful for the following reason: ' + status);
                        }
                    });
                }
            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCA841zy-xicfYA5AVJasPp1tTS2jmv0KQ&callback=initMap">
            </script>


            <!-- .google map -->

            <input type="submit" class="btn btn-success pull-left" value="اضافة منفذ">

            {!! Form::close() !!}


        </div>
    </div>
@stop