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
                       اضافة فاتورة شراء</span>
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
                    <form action="{{ route('invoiceBuy.store') }}" method="post" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="supplier_id">اسم المورد</label>
                                    <select name="supplier_id" class="unit form-control SlectBox"
                                            onclick="console.log($(this).val())"
                                            onchange="console.log('change is firing')">
                                        <!--placeholder-->
                                        <option value="" selected disabled>حدد المورد</option>
                                        @foreach ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}"> {{ $supplier->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('supplier_id')<span
                                        class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="invoice_number">رقم الفاتوره</label>
                                    <input type="text" name="invoice_number" class="form-control">
                                    @error('invoice_number')<span
                                        class="help-block text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
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
                                        <select name="category_id" class="unit form-control SlectBox"
                                                onclick="console.log($(this).val())"
                                                onchange="console.log('change is firing')">
                                            <!--placeholder-->
                                            <option value="" selected disabled>حدد القسم</option>
                                            @foreach ($categorise as $category)
                                                <option
                                                    value="{{ $category->id }}"> {{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <select id="product_id" name="product" class="unit form-control">
                                        </select>
                                        @error('product_id')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="number_product" step="0.01" id="quantity"
                                               class="number_product form-control">
                                        @error('number_product')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" name="price_buy" step="0.01" id="price_buy"
                                               class="price_buy form-control">
                                        @error('price_buy')<span
                                            class="help-block text-danger">{{ $message }}</span>@enderror
                                    </td>
                                    <td>
                                        <input type="number" step="0.01" name="total_row" id="row_sub_total"
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

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    <script>
        $(document).ready(function () {
            $('select[name="category_id"]').on('change', function () {
                var categoryId = $(this).val();
                if (categoryId) {
                    $.ajax({
                        url: "{{ URL::to('category') }}/" + categoryId,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="product"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#invoice_details').on('keyup blur', '.number_product', function () {
                let $row = $(this).closest('tr');
                let number_product = $row.find('.number_product').val() || 0;
                let price_buy = $row.find('.price_buy').val() || 0;

                $row.find('.row_sub_total').val((number_product * price_buy).toFixed(2));

                $('#total').val(sum_total('.row_sub_total'));
            });
            $('#invoice_details').on('keyup blur', '.price_buy', function () {
                let $row = $(this).closest('tr');
                let number_product = $row.find('.number_product').val() || 0;
                let price_buy = $row.find('.price_buy').val() || 0;

                $row.find('.row_sub_total').val((number_product * price_buy).toFixed(2));

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

        });
    </script>

@endsection
