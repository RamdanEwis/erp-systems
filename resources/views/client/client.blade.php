@extends('layouts.master')
@section('title')
    العملاء
@endsection
@section('css')
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet"/>
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> العملاء</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمه العملاء </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- row -->
    <div class="row">
        @if(session()->has('Add'))
            <div class="col-md-12 alert alert-success show text-center" role="alert">
                <strong>{{session()->get('Add')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('Payment'))
            <div class="col-md-12 alert alert-primary show text-center" role="alert">
                <strong>{{session()->get('Payment')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('update'))
            <div class="col-md-12 alert alert-success show text-center" role="alert">
                <strong>{{session()->get('update')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('delete'))
            <div class="col-md-12 alert alert-danger show text-center" role="alert">
                <strong>{{session()->get('delete')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if(session()->has('Error'))
            <div class="alert alert-danger show" role="alert">
                <strong>{{session()->get('Error')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif

    <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="col-sm-6 col-md-12 col-xl-12">
                        <a class="modal-effect btn btn-outline-success  btn-block" data-effect="effect-scale"
                           data-toggle="modal" href="#modaldemo18">اضافه عميل</a>
                    </div>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم العميل</th>
                                <th class="border-bottom-0">رقم الهاتف</th>
                                <th class="border-bottom-0">المبلغ المستحق العميل</th>
                                <th class="border-bottom-0"> تاريخ الاضافه</th>
                                <th class="border-bottom-0">تاريخ التعديل</th>
                                <th class="border-bottom-0">مضاف بواسطة</th>
                                <th class="border-bottom-0">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>

                            @foreach($clients as $client)
                                <?php $i++ ?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$client->name}}</td>
                                    <td>{{$client->phone}}</td>
                                    <td>{{$client->AmountDue}}</td>
                                    <td>{{$client->created_at}}</td>
                                    <td>{{$client->updated_at}}</td>
                                    <td>Name : {{$client->create_by}}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm" data-effect="effect-scale"
                                                data-id="{{ $client->id }}" data-name="{{ $client->name }}"
                                                data-amountdue="{{ $client->AmountDue }}" data-toggle="modal"
                                                href="#modaldemo15"
                                                title="تعديل">دفعه الي المورد
                                        </button>

                                        <button class="btn btn-outline-success btn-sm" data-effect="effect-scale"
                                                data-id="{{ $client->id }}" data-name="{{ $client->name }}"
                                                data-amountdue="{{ $client->AmountDue }}"  data-phone="{{$client->phone}}" data-toggle="modal"
                                                href="#modaldemo9"
                                                title="تعديل">تعديل
                                        </button>

                                        <button class="btn btn-outline-danger btn-sm " data-effect="effect-scale"
                                                data-id="{{ $client->id }}" data-name="{{ $client->name }}"
                                                data-toggle="modal"
                                                href="#modaldemo10" title="حذف">حذف
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- row closed -->
    <!-- Modal Add categories effects -->
    <div class="modal" id="modaldemo18">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">

                <form method="post" action="{{route('clients.store')}}">
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title">اضافه العميل</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>اسم العميل</label>
                            <input type="text" class="form-control" name="name"  autocomplete="اسم الغميل"
                                   autofocus>
                        </div>
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="text" class="form-control" name="phone"  autocomplete="رقم الهاتق"
                                   autofocus>
                        </div>
                        <div class="form-group">
                            <label>المبلغ المستحق علي العميل</label>
                            <input type="text" class="form-control" name="AmountDue"  autocomplete="المبلغ المستحق علي العميل"
                                   autofocus>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">حفظ</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->

    <!-- Modal Payment categories  effects -->
    <div class="modal" id="modaldemo15">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">

                <form method="post" action="{{route('Payment_clients')}}">

                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title"> دفعه الي العميل</h6>

                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>اسم العميل</label>
                            <input value="" type="hidden" id="id" name="id">
                            <input type="text" id="name" class="form-control" name="name" required autocomplete="off"
                                   readonly>
                        </div>
                        <div class="form-group">
                            <label>قيمه الدفعه</label>
                            <input type="text" class="form-control" name="Payment" required autocomplete="off">

                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">حفظ</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->

    <!-- Modal edite categories  effects -->
    <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">

                <form method="post" action="clients/update">
                    {{method_field('patch')}}
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title"> تعديل العميل</h6>

                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>اسم العميل</label>
                            <input value="" type="hidden" id="id" name="id">
                            <input type="text" id="name" class="form-control" name="name" required autocomplete="off" readonly>
                        </div>
                        <div class="form-group">
                            <label>رقم الهاتف</label>
                            <input type="text" id="phone" class="form-control" name="phone" required autocomplete="off" >
                        </div>
                        <div class="form-group">
                            <label>المبلغ المستحق العميل</label>
                            <input type="text" id="AmountDue" class="form-control" name="AmountDue" required
                                   autocomplete="off">
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">حفظ</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->

    <!-- Modal delete categories  effects -->
    <div class="modal" id="modaldemo10">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">

                <form method="post" action="clients/destroy">
                    {{method_field('delete')}}
                    @csrf
                    <div class="modal-header">
                        <h6 class="modal-title"> هل انت متاكد من حذف العميل ؟</h6>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input value="" type="hidden" id="id" name="id">
                            <input type="text" id="name" class="form-control" name="name" readonly>
                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-primary" type="submit">حذف</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal effects-->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->


@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
    <!--Internal  Datatable js -->
    <script src="{{URL::asset('assets/js/table-data.js')}}"></script>
    <!--start modals-->
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('assets/js/modal.js')}}"></script>

    <script>
        $('#modaldemo15').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var amountdue = button.data('amountdue')
            var Payment = button.data('Payment')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #amountdue').val(amountdue);
            modal.find('.modal-body #Payment').val(Payment);
        })
    </script>

    <script>
        $('#modaldemo9').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var phone = button.data('phone')
            var AmountDue = button.data('amountdue')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
            modal.find('.modal-body #phone').val(phone);
            modal.find('.modal-body #AmountDue').val(AmountDue);
        })
    </script>

    <script>
        $('#modaldemo10').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #name').val(name);
        })
    </script>

@endsection
