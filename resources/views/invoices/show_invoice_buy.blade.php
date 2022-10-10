@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet"/>
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    تفاصيل فاتورة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                     تفاصيل فاتوره شراءInvoice Numper#{{$invoices->id}}  </span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
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

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header" style="margin: 35px;">
                    <a class="float-left dsktop-logo logo-light active" href="http://localhost/github/erp-systems/public/home"><img src="http://localhost/github/erp-systems/public/assets/img/brand/logo.png" class="main-logo" alt="logo"></a>
                    <h2>{{ $invoices->invoice_number}}</h2>
                    <a href="{{ route('invoiceBuy.index') }}" class="btn btn-primary ml-auto"><i class="fa fa-home"></i> جميع الفواتير</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>اسم المورد</th>
                                  <td>  {{ $invoices->Supplier->name}}</td>
                            </tr>
                            <tr>
                                <th>رقم الفاتوره</th>
                                <td> invoice#{{ $invoices->id }}</td>
                                <th>تاريخ الفاتوره</th>
                                <td>{{ $invoices->invoice_date }}</td>
                            </tr>
                        </table>
                        <h3>تفاصيل الفاتوره</h3><br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المنتج</th>
                                <th>القسم</th>
                                <th>العدد</th>
                                <th>السعر</th>
                                <th>الاجمالي</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices->BuysDetails as $item)
                                <tr>
                                    <td>
                                        {{$loop->index}}
                                    </td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->category_id }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->unit_price }}</td>
                                    <td>{{ $item->row_sub_total }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>

                            <tr>
                                <td colspan="3"></td>
                                <th colspan="2">الاجمالي</th>
                                <td>{{ $invoices->total}}</td>
                            </tr>
                            </tfoot>

                        </table>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="{{ route('invoiceBuy.print', $invoices->id) }}" class="btn btn-primary btn-sm ml-auto"><i class="fa fa-print"></i>طباعه </a>
                            <a href="{{ route('invoiceBuy.pdf', $invoices->id) }}" class="btn btn-secondary btn-sm ml-auto"><i class="fa fa-file-pdf"></i>تحميل  </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!-- Internal form-validtion js -->
    <script src="{{ URL::asset('js/form_validtion/jquery.form.js ') }}"></script>
    <script src="{{ URL::asset('js/form_validtion/jquery.validate.min.js ') }}"></script>
    <script src="{{ URL::asset('js/form_validtion/additional-methods.min.js ') }}"></script>
    <script src="{{ URL::asset('js/form_validtion/messages_ar.js') }}"></script>

@endsection

