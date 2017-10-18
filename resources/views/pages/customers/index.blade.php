@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{asset('js/select.js')}}"></script>
    <section class="content-header">
        <h1>
            العملاء
            <small>عرض العملاء</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">العملاء</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary">
        <div class="box-header text-right">
            {!! Form::open(['route' => ['customers.import'], 'method' => 'post', 'files' => true]) !!}
                <input type="file" name="import_file" />
                <button class="btn btn-default"><i class="fa fa-upload"></i>استيراد الأسماء كبطاقات csv</button>
            {!! Form::close() !!}
            <br>
            {{--<a href="#" class="btn btn-default"><i class="fa fa-download"></i>  استيراد الأسماء كبطاقات csv</a>--}}
            <a href="{{url('customer/export')}}" class="btn btn-default"><i class="fa fa-download"></i> تصدير الأسماء كبطاقات csv</a>
            <a href="{{url('customers/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> إضافة عميل جديد</a>
            <a href="{{url('customer/archive')}}" class="btn btn-success pull-left"><i class="fa fa-archive"></i> الأرشيف </a>
        </div>
        </div>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة العملاء</h3>
                    {{--<a href="{{url('customer/archive')}}" class="btn btn-primary pull-left"><i class="fa fa-gear" ></i> الخيارات </a>--}}
                    {{--<div class="dropdown pull-left">--}}
                        {{--<button class="btn btn-primary dropdown-toggle " type="button" data-toggle="dropdown"> <i class="fa fa-gear" ></i>الخيارات--}}
                            {{--<span class="caret"></span></button>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a class="delAll" href="{{url('#')}}"><i class="fa fa-trash "></i>مسح الكل</a></li>--}}
                            {{--<li><button class="delSel" value="customers"><i class="fa fa-remove"></i>مسح المحدد</button></li>--}}
                            {{--<li><a class="delSel" href="{{url('#')}}"><i class="fa fa-remove"></i>مسح المحدد</a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    <button class="delSel pull-left btn btn-primary" ><i class="fa fa-trash"></i> مسح المحدد </button>

                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover display" id="example"  cellspacing="0">
                        <thead>
                        <tr>
                            <th class="fa fa-sort-amount-desc">id</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th >id</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($cus as $cu)
                            @if($cu->flag==0)
                        <tr id="{{$cu->id}}">
                            <td >{{$cu->id}}</td>
                            <td>{{$cu->fname." "}}{{$cu->lname}}</td>
                            <td>{{$cu->address}}</td>
                            <td>{{$cu->phone1}}</td>
                            <td>{{$cu->created_at}}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('customers/'.$cu->id)}}"><i class="fa fa-eye pull-left"></i>عرض</a></li>
                                        <li><a href="{{url('customers/'.$cu->id.'/edit')}}"><i class="fa fa-edit pull-left"></i>تعديل</a></li>
                                        <li><a href="{{url('customers/archive/'.$cu->id)}}"><i class="fa fa-archive pull-left"></i>نقل للأرشيف</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endif
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->

@stop

@section('script')
    <script src="{{url('/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('/js/dataTables.select.min.js')}}"></script>
    <script>
        /**
         * Created by anas on 21/08/2016.
         */
        $(document).ready(function() {
            var table=$('#example').DataTable( {
                columnDefs: [ {
                    // orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                } ],

                select: {
                    style:    'os',
                    className: 'row-selected',
                    selector: 'td:first-child'

                },
                order: [[ 0, 'asc' ]],
            } );
            selected = [];
            $('#example tbody').on( 'click', 'tr', function () {
                var id = this.id;
                var index = $.inArray(id, selected);
                if (index === -1)
                {
                    selected.push(id);
                } else
                {
                    selected.splice(index, 1);
                }
                $(this).toggleClass('selected');
            } );
            $('.delSel').click(function () {
                console.log(selected );
                $.ajax("{{url('foo/bar')}}",{
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "ids": selected
                    },
                    success: function(result) {
                       window.location.href='{{url('/customers')}}'
                    }
                });
            });
        } );

    </script>

  @stop