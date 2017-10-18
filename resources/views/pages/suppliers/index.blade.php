@extends('../../layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            الموردين
            <small>عرض الموردين</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> الرئيسية</a></li>
            <li class="active">الموردين</li>
        </ol>
    </section>
    <br><br>
    <div class="box box-primary" >
        <div class="box-header text-right" style="position: relative;">
            {!! Form::open(['route' => ['suppliers.import'], 'method' => 'post', 'files' => true]) !!}
            <input type="file" name="import_file" />
            <button class="btn btn-default"><i class="fa fa-upload"></i>استيراد الأسماء كبطاقات csv</button>
            {!! Form::close() !!}
            <br>
            {{--<a href="#" class="btn btn-default"><i class="fa fa-download"></i>  استيراد الأسماء كبطاقات csv</a>--}}
            <a href="{{url('supplier/export')}}" class="btn btn-default"><i class="fa fa-download"></i> تصدير الأسماء كبطاقات csv</a>
            <a href="{{url('suppliers/create')}}" class="btn btn-success"><i class="fa fa-plus"></i> إضافة مورد جديد</a>
            {{--<a href="{{url('sup_order/')}}" class="btn btn-primary pull-left" style="position: absolute; top: 10px; left: 10px;">--}}
                {{--<i class="fa fa-shopping-cart "></i>طلب شراء من مورد</a>--}}
            <a href="{{url('supplier/archive')}}" class="btn btn-success pull-left"><i class="fa fa-archive"></i> الأرشيف </a>
            {{--<a href="{{url('#')}}" class="btn btn-success pull-left"><i class="fa fa-plus"></i> طلب شراء من مورد</a>--}}
        </div>
    </div>
    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">قائمة الموردين</h3>

                    <button class="supSel pull-left btn btn-primary" ><i class="fa fa-trash"></i> مسح المحدد </button>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-hover display" id="example"  cellspacing="0">
                        <thead>
                        <tr>
                            <th>رقم المورد</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>رقم المورد</th>
                            <th>الاسم</th>
                            <th>العنوان</th>
                            <th>رقم الهاتف</th>
                            <th>تاريخ الاضافة</th>
                            <th>الخيارات</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($suppliers as $sup)
                            @if($sup->flag==0)
                            <tr id="{{$sup->id}}">
                                <td>{{$sup->id}}</td>
                                <td>{{$sup->fname." "}}{{$sup->lname}}</td>
                                <td>{{$sup->address}}</td>
                                <td>{{$sup->phone1}}</td>
                                <td>{{$sup->created_at}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">قائمة الخيارات
                                            <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('suppliers/'.$sup->id)}}"><i class="fa fa-eye pull-left"></i>عرض</a></li>
                                            <li><a href="{{url('suppliers/'.$sup->id.'/edit')}}"><i class="fa fa-edit pull-left"></i>تعديل</a></li>
                                            <li><a href="{{url('suppliers/archive/'.$sup->id)}}"><i class="fa fa-archive pull-left"></i>نقل للأرشيف</a></li>
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
            $('.supSel').click(function () {
                $.ajax("{{url('sup/foo')}}",{
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "ids": selected
                    },
                    success: function(result) {
                        window.location.href='{{url('/suppliers')}}'
                    }
                });
            });
        } );

    </script>
@stop