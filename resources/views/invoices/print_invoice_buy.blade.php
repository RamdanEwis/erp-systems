@extends('layouts.print')
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
    طباعه فاتورة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">


        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header ">
                    <h2>Invoice#{{ $invoices->id}}</h2>

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
                                    <td>{{$loop->index}}</td>
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

                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td colspan="1"></td>

                                <th colspan="2">الاجمالي</th>
                                <td>{{ $invoices->total}}</td>
                            </tr>
                            </tfoot>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- row closed -->

@endsection
@section('js')
    <script>
        window.print();
    </script>

@endsection

