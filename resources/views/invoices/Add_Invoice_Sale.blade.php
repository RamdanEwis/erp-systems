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
    اضافة فاتورة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    اضافة فاتورة</span>
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

                <div class="card-body">
                    <a href="{{ route('invoicesSale.index') }}" class="btn btn-primary ml-auto"><i class="fa fa-home"></i> جميع الفواتير</a><br><br><br>
                    <form action="{{ route('invoicesSale.store') }}" method="post" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="client_id">اسم العميل</label>
                                    <select name="client_id" class="client_id form-control SlectBox"
                                            onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')">
                                        <!--placeholder-->
                                        <option value="" selected disabled>حدد العميل</option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"> {{ $client->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('client_id')<span
                                        class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="invoice_date">تاريخ الفاتوره</label>
                                    <input type="text" name="invoice_date" class="form-control pickdate"
                                           value="{{ now() }}">
                                    @error('invoice_date')<span
                                        class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <br><br><br><br>
                        <div class="table-responsive">
                            <table class="table" id="invoice_details">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>القسم</th>
                                    <th>اسم المنتج</th>
                                    <th>العدد</th>
                                    <th>السعر</th>
                                    <th>الاجمالي</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="cloning_row" id="0">
                                    <td>#</td>
                                    <td>
                                        <select name="category_id[0]" class="unit form-control "
                                                onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')">
                                            <!--placeholder-->
                                            <option value="" selected disabled>حدد القسم</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    value="{{ $category->category_name }}"> {{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <select id="product_id" name="product_name[0]" class="unit form-control">
                                            <option value="" selected disabled>حدد المنتج</option>
                                            @foreach ($products as $product)
                                                <option
                                                    value="{{ $product->product_name }}"> {{ $product->product_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('product')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[0]" step="0.01" id="quantity"
                                               class="quantity form-control">
                                        @error('number_product')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="unit_price[0]" step="0.01" id="unit_price"
                                               class="unit_price form-control">
                                        @error('unit_price')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="row_sub_total[0]" id="row_sub_total"
                                               class="row_sub_total form-control" readonly="readonly">
                                        @error('row_sub_total')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                </tr>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <button type="button" class="btn_add btn btn-outline-success">اضافه منتج
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2" class="text-left">الاجمالي</td>
                                    <td><input type="number" step="0.01" name="total" id="total"
                                               class="total form-control" readonly="readonly"></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="text- pt-5">
                            <button type="submit" name="save" class="btn btn-lg btn-block btn-primary">حفظ</button>
                        </div>
                    </form>
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

    <script src="{{ URL::asset('js/form_validtion/jquery.form.js ') }}"></script>
    <script src="{{ URL::asset('js/form_validtion/jquery.validate.min.js ') }}"></script>
    <script src="{{ URL::asset('js/form_validtion/additional-methods.min.js ') }}"></script>
    <script src="{{ URL::asset('js/form_validtion/messages_ar.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    <script>
        $(document).ready(function () {
            $('#invoice_details').on('keyup blur', '.quantity', function () {
                let $row = $(this).closest('tr');
                let quantity = $row.find('.quantity').val() || 0;
                let unit_price = $row.find('.unit_price').val() || 0;

                $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));
                $('#total').val(sum_total('.row_sub_total'));
            });
            $('#invoice_details').on('keyup blur', '.unit_price', function () {
                let $row = $(this).closest('tr');
                let quantity = $row.find('.quantity').val() || 0;
                let unit_price = $row.find('.unit_price').val() || 0;

                $row.find('.row_sub_total').val((quantity * unit_price).toFixed(2));

                $('#total').val(sum_total('.row_sub_total'));
            });
            let sum_total = function ($selector) {
                let sum = 0;
                $($selector).each(function () {
                    let selectorVal = $(this).val() != '' ? $(this).val() : 0;
                    sum += parseFloat(selectorVal);
                });
                return sum.toFixed(2);
            }
            $(document).on('click', '.btn_add', function () {
                let tr_count = $('#invoice_details').find('tr.cloning_row:last').length;
                let numberIncr = tr_count > 0 ? parseInt($('#invoice_details').find('tr.cloning_row:last').attr('id')) + 1 : 0 ;

                $('#invoice_details').find('tbody').append($('' +
                    '<tr class="cloning_row" id="' + numberIncr + '"> ' +
                    '<td> <button type="button" class="btn btn-danger btn-sm btn_delete_prudct"><i class="fa fa-minus"></i></button> </td>' +
                    '<td>' +
                    '<select name="category_id[' + numberIncr + ']" class="unit form-control SlectBox">' +
                    '<option value="" selected disabled>حدد القسم</option>' +
                    '@foreach ($categories as $category) ' +
                    '<option ' +
                    'value=" {{ $category->category_name }} "> {{ $category->category_name }} </option> ' +
                    ' @endforeach' +
                    '</select>' +
                    ' @error('category_id')<span ' +
                    '  class="help-block text-danger">{{ $message }}</span>@enderror ' +
                    '</td>' +
                    '<td>' +
                    '<select id="product_id"  name="product_name[' + numberIncr + '] " class="unit form-control SlectBox"> ' +
                    '<option value="" selected disabled>حدد المنتج</option>' +
                    '@foreach ($products as $product) ' +
                    '<option ' +
                    'value=" {{ $product->product_name }} "> {{ $product->product_name }} </option> ' +
                    ' @endforeach' +
                    '</select>' +
                    '  @error('product')<span' +
                    ' class="help-block text-danger">{{ $message }}</span>@enderror' +
                    '</td>' +
                    '<td>' +
                    '<input type="number" name="quantity[' + numberIncr + ']" step="0.01"  class="quantity form-control"> ' +
                    '       @error('quantity')<span' +
                    '   class="help-block text-danger">{{ $message }}</span>@enderror' +
                    '</td>' +
                    '<td>' +
                    '<input type="number" name="unit_price[' + numberIncr + ']" step="0.01" class="unit_price form-control"> ' +
                    '     @error('unit_price')<span' +
                    '  class="help-block text-danger">{{ $message }}</span>@enderror' +
                    '</td>' +
                    '<td>' +
                    ' <input type="number" step="0.01" name="row_sub_total[' + numberIncr + ']"  class="row_sub_total form-control" readonly="readonly"> ' +
                    '         @error('row_sub_total')<span' +
                    ' class="help-block text-danger">{{ $message }}</span>@enderror' +
                    ' </td> ' +
                    ' </tr>'));
            });

            $(document).on('click', '.btn_delete_prudct' , function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                $('#total').val(sum_total('.row_sub_total'));
            });

            $('form').on('submit' , function ($e) {
                $('select.product_name').each(function () { $(this).rules("add",{required:true}) ; }) ;
                $('input.invoice_number').each(function () { $(this).rules("add",{required:true}); }) ;
                $('input.invoice_date').each(function () { $(this).rules("add",{required:true}); }) ;
                $('select.category_id').each(function () { $(this).rules("add",{required:true}); }) ;
                $('input.unit_price').each(function () { $(this).rules("add",{required:true}); }) ;
                e.preventDefault();
            });

            $('form').validate({
                rules:{
                    '  client_id' :   {required:true,digits:true},
                    ' invoice_number ' : {required:true,digits:true},
                    ' invoice_date ':  {required:true},
                    ' category_id ' : {required:true,digits:true},
                    ' product_name' :  {required:true,digits:true},
                    ' unit_price' :  {required:true}
                },
                submitHandler:function (form) {
                    form.submit();
                }
            });
        });
    </script>

@endsection
