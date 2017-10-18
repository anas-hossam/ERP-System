@extends('../../layouts.app')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="{{asset('js/update.js')}}"></script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            العملاء
            <small>طلب منتج</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li><a href="{{url('/customers')}}">العملاء</a></li>
            <li><a href="{{url('/customers/'.$id)}}">عرض عميل</a></li>
            <li class="active">طلب منتج</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box box-primary">
            <div class="box-header with-border"><h2 class="box-title">طلب منتج</h2></div>
            <hr>
            <br>
        <div class="box-body">
            <div class="box-header with-border"><h3 class="box-title">1. معلومات الاتصال</h3></div>
            <br>
            <div>@include('errors.list')</div>
            {!! Form::open(['route' => ['order.store'], 'method' => 'post']) !!}
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <input type="hidden" name="cusId" value="{{$id}}">
                    <div class="form-group">
                        <label>الاسم</label>
                        <input class="form-control" type="text" name="name" value="{{old('name')}}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>الهاتف</label>
                        <input class="form-control" type="text" name="mobile" value="{{old('mobile')}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>التليفون</label>
                        <input class="form-control" type="text" name="tel" value="{{old('tel')}}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>الفاكس</label>
                        <input class="form-control" type="text" name="fax" value="{{old('fax')}}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>البريد الالكتروني</label>
                        <input class="form-control" type="email" name="email" value="{{old('email')}}">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>الشركة</label>
                        <input class="form-control" type="text" name="company" value="{{old('company')}}" >
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-lg-4">
                    <div class="form-group">
                        <label>الموقع الالكترونى</label>
                        <input class="form-control" type="url" name="website" value="{{old('website')}}">
                    </div>
                </div>
            </div>
            <hr>
            <br>
            <div class="box-header with-border"><h3 class="box-title">2. موقع المشروع</h3></div>
            <br>
            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>الشارع</label>
                    <input class="form-control" type="text" name="street" value="{{old('street')}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>المدينة</label>
                    <input class="form-control" type="text" name="city" value="{{old('city')}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-4">
                <div class="form-group">
                    <label>الدولة</label>
                    <input class="form-control" type="text" name="country" value="{{old('country')}}">
                </div>
            </div>
            <hr>
            <br><br>
            <div class="box-header with-border"><h3 class="box-title">3. أسباب اختيار Light Guage Steel Prefab Building</h3></div>
            <br>
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="form-group">
                    <textarea class="form-control" name="reason" >{{old('reason')}}</textarea>
                </div>
            </div>
            <hr>
            <br><br>
            <div class="box-header with-border"><h3 class="box-title">4. نوع البناء</h3></div>
            <br>

                                <div class="box-header">
                                    <div class="box-header with-border"><h5 class="box-title">1.4 بناء سكنى</h5></div>
                                </div>
                                <div class="box-body">
                                    <!-- Minimal style -->
                                    <!-- checkbox -->
                                    <div class="form-group check1">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                        <label>
                                            <input type="checkbox" class="minimal" name="res_build[0]" value="فيلا للمعيشة" placeholder="{{old('res_build[0]')}}">فيلا للمعيشة
                                        </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="res_build[1]" value="فيلا للبيع" placeholder="{{old('res_build[1]')}}">فيلا للبيع
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="res_build[2]" value="منزل شبه منفصل للمعيشه" placeholder="{{old('res_build[2]')}}">منزل شبه منفصل للمعيشه
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="res_build[3]" value="منزل شبه منفصل للبيع" placeholder="{{old('res_build[3]')}}">منزل شبه منفصل للبيع
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="res_build[4]" value="منازل مدينة"  placeholder="{{old('res_build[4]')}}">منازل مدينة
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="res_build[5]" value="شقة" placeholder="{{old('res_build[5]')}}">شقة
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="res_build[6]" value="مهجع" placeholder="{{old('res_build[6]')}}">مهجع
                                            </label>
                                        </div>
                                    </div>
                                    </div>
                                    <hr>
                                    <br><br>
                                    <div class="box-header">
                                        <div class="box-header with-border"><h5 class="box-title">2.4 بناء تجارى</h5></div>
                                    </div>
                                    <div class="box-body">
                                    <!-- Minimal style -->
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="comm_build[0]" value="مستودع" placeholder="{{old('comm_build[0]')}}">مستودع
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="comm_build[1]" value="مكتب" placeholder="{{old('comm_build[1]')}}">مكتب
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="comm_build[2]" value="فندق" placeholder="{{old('comm_build[2]')}}">فندق
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="comm_build[3]" value="سوبر ماركت" placeholder="{{old('comm_build[3]')}}">سوبر ماركت
                                            </label>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <label>
                                                <input type="checkbox" class="minimal" name="comm_build[4]" value="محلات" placeholder="{{old('comm_build[4]')}}">محلات
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                        <hr>
                                        <br><br>
                                        <div class="box-header">
                                            <div class="box-header with-border"><h5 class="box-title">3.4 بناء عام</h5></div>
                                        </div>
                                        <div class="box-body">
                                            <!-- Minimal style -->
                                            <!-- checkbox -->
                                            <div class="form-group">
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                                    <label>
                                                        <input type="checkbox" class="minimal" name="pub_build[0]" value="مدرسة" placeholder="{{old('pub_build[0]')}}">مدرسة
                                                    </label>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                                    <label>
                                                        <input type="checkbox" class="minimal" name="pub_build[1]" value="مستشفى" placeholder="{{old('pub_build[1]')}}">مستشفى
                                                    </label>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                                    <label>
                                                        <input type="checkbox" class="minimal" name="pub_build[2]" value="كنيسة" placeholder="{{old('pub_build[2]')}}">كنيسة
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        <hr>
                                        <br><br>
                                        <div class="box-header">
                                            <div class="box-header with-border"><h5 class="box-title">4.4 بناء آخر</h5></div>
                                        </div>
                                        <div class="box-body">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea  id="" class="form-control" name="others">{{old('others')}}</textarea>
                                            </div>
                                        </div>
                                        <hr>
                                        <br><br>
            <!-- table req_for_design-->
            <div class="box-header with-border"><h3 class="box-title">5. متطلبات التصميم للمحتوى</h3></div>
            <br>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label>مجموع المنطقة الارضية</label>
                    <input class="form-control" type="number" name="tot_floor" value="{{old('tot_floor')}}">متر مربع
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label>الطوابق</label>
                    <input class="form-control" type="text" name="floors" value="{{old('floors')}}">طابق
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label>سعة السكن</label>
                    <input class="form-control" type="number" name="capacity" value="{{old('capacity')}}">اشخاص
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12">شكل السطح
                <label>
                    <input type="checkbox" class="minimal" name="shape_roof[0]" value="مسطح" placeholder="{{old('shape_roof[0]')}}">مسطح
                </label>
                <label>
                    <input type="checkbox" class="minimal" name="shape_roof[1]" value="منحدر" placeholder="{{old('shape_roof[1]')}}">منحدر
                </label>
            </div>
            <hr>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label>غرف المعيشة</label>
                    <input class="form-control" type="number" name="liv_room" value="{{old('liv_room')}}">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label>غرف العشاء</label>
                    <input class="form-control" type="number" name="din_room" value="{{old('din_room')}}">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-4">
                <div class="form-group">
                    <label>غرف النوم</label>
                    <input class="form-control" type="number" name="bedrooms" value="{{old('bedrooms')}}">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>غرفه نوم بمرحاض closet</label>
                    <input class="form-control" type="number" name="tot_br[0]"  placeholder="{{old('tot_br[0]')}}" value="غرفه نوم بمرحاض closet">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>غرفه نوم بمرحاض</label>
                    <input class="form-control" type="number" name="tot_br[1]" placeholder="{{old('tot_br[1]')}}" value="غرفه نوم بمرحاض">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>غرفه نوم فقط closet</label>
                    <input class="form-control" type="number" name="tot_br[2]" placeholder="{{old('tot_br[2]')}}" value="غرفه نوم فقط closet">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>غرفه نوم بلا اضافات</label>
                    <input class="form-control" type="number" name="tot_br[3]" placeholder="{{old('tot_br[3]')}}" value="غرفه نوم بلا اضافات">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>حمام مشترك</label>
                    <input class="form-control" type="number" name="shar_bathr" value="{{old('shar_bathr')}}">حمام
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>مطبخ</label>
                    <input class="form-control" type="text" name="kitch" value="{{old('kitch')}}">مطبخ
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>بالكونه/ تراس</label>
                    <input class="form-control" type="number" name="balecony" value="{{old('balecony')}}">بالكون/تراس
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>غرفه دراسة</label>
                    <input class="form-control" type="number" name="study_r" value="{{old('study_r')}}">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>غرفة المغسلة</label>
                    <input class="form-control" type="number" name="laundry_r" value="{{old('laundry_r')}}">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>غرفه الخدم</label>
                    <input class="form-control" type="number" name="servant_r" value="{{old('servant_r')}}">غرفه
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-lg-3">
                <div class="form-group">
                    <label>جراج</label>
                    <input class="form-control" type="number" name="garage" value="{{old('garage')}}">جراج
                </div>
            </div>
            <div class="form-group">
            <div class="box-body">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  متطلبات اخرى
                    <textarea  id="" class="form-control" name="reqs">{{old('reqs')}}</textarea>
                </div>
            </div>
            </div>
            <hr>
            <br><br>
            <div class="box-header with-border"><h3 class="box-title">6. ميزانية تقريبية لبناء المنزل</h3></div>
            <div class="form-group">
                <div class="box-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea id="" class="form-control" name="budget">{{old('budget')}}</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <br><br>
            <div class="box-header">
                <div class="box-header with-border"><h5 class="box-title">7 احتياجات رسم التصميم</h5></div>
            </div>
            <div class="box-body">
                <!-- Minimal style -->
                <!-- checkbox -->
                <div class="form-group">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <label>
                            <input type="checkbox" class="minimal" name="des_draw[0]" value="رسم تخطيطي" placeholder="{{old('des_draw[0]')}}">رسم تخطيطي
                        </label>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <label>
                            <input type="checkbox" class="minimal" name="des_draw[1]" value="رسم عالى" placeholder="{{old('des_draw[1]')}}">رسم عالى
                        </label>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <label>
                            <input type="checkbox" class="minimal" name="des_draw[2]" value="رسم ثلاثى الأبعاد" placeholder="{{old('des_draw[2]')}}">رسم ثلاثى الأبعاد
                        </label>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <label>
                            <input type="checkbox" class="minimal" name="des_draw[3]" value="رسم ثلاثى الأبعاد للتصميم الداخلى" placeholder="{{old('des_draw[3]')}}">رسم ثلاثى الأبعاد للتصميم الداخلى
                        </label>
                    </div>
                </div>
            </div>
            <hr>
            <br><br>
            <div class="box-header with-border"><h3 class="box-title">8. وقت البدء المقدر للبناء</h3></div>
            <div class="form-group">
                <div class="box-body">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <textarea id="" class="form-control" name="beg_time">{{old('beg_time')}}</textarea>
                    </div>
                </div>
            </div>
            <hr>
            <br><br>
            <div class="box-header">
                <div class="box-header with-border"><h5 class="box-title">9 احتياج فريق بناء</h5></div>
            </div>
            <div class="box-body">
                <!-- Minimal style -->
                <!-- checkbox -->
                <div class="form-group">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <label>
                            <input type="checkbox" class="minimal" name="team_need[0]" value="لا , انا املك فريق بناء شخصى" placeholder="{{old('team_need[0]')}}">لا , انا املك فريق بناء شخصى
                        </label>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <label>
                            <input type="checkbox" class="minimal" name="team_need[1]" value="نعم , لكن احتاج فقط مهندس لارشاد البناء" placeholder="{{old('team_need[1]')}}">نعم , لكن احتاج فقط مهندس لارشاد البناء
                        </label>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                        <label>
                            <input type="checkbox" class="minimal" name="team_need[2]" value="نعم , احتاج فريق بناء ليساعدنى بالبناء" placeholder="{{old('team_need[2]')}}">نعم , احتاج فريق بناء ليساعدنى بالبناء
                        </label>
                    </div>

                </div>
            </div>
            <br><br>


            <input type="submit" class="btn btn-success pull-left" value="طلب المنتج"><br><br>

            {!! Form::close() !!}


        </div>
            </div>
        </div>
    </div>
@stop