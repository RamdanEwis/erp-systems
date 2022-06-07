@extends('layouts.master')
@section('title')
    الصفحه الرئيسية
@endsection
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->

    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm" style=" margin: 150px;">

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">

            <a href="{{ url('/' . $page='') }}"><div class="card overflow-hidden sales-card bg-primary-gradient">
                    <div class="pl-5 pt-5 pr-5 pb-3 pt-0">
                        <div class="">
                            <h6 class="mb-3 tx-12 text-white"></h6>
                        </div>
                        <div class="pb-0 mt-0">
                            <div class="d-flex">
                                <div class="">
                                    <h1 class="tx-20 font-weight-bold mb-1 text-white text-center" style="padding-right: 82px;">المخزن</h1>
                                    <p class="mb-0 tx-12 text-white op-7"></p>
                                </div>
                                <span class="float-right my-auto mr-auto">

                                                <span class="text-white op-7"> </span>
                                            </span>
                            </div>
                        </div>
                    </div>
                    <span id="compositeline" class="pt-7"></span>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='invoiceBuy/create') }}">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-5 pt-5 pr-5 pb-5 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h1 class="tx-20 font-weight-bold mb-1 text-white" style="padding-right: 82px;">فاتوره شراء
                                </h1>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>
                            <span class="float-right my-auto mr-auto">

											<span class="text-white op-7"> </span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-7"></span>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='invoices/create') }}">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-5 pt-5 pr-5 pb-5 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h1 class="tx-20 font-weight-bold mb-1 text-white" style="padding-right: 82px;">فاتوره بيع</h1>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>
                            <span class="float-right my-auto mr-auto">

											<span class="text-white op-7"> </span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-7"></span>
            </div>
            </a>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='products') }}">
            <div class="card overflow-hidden sales-card bg-secondary-gradient">
                <div class="pl-5 pt-5 pr-5 pb-5 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h1 class="tx-20 font-weight-bold mb-1 text-white" style="padding-right: 82px;">المنتجات</h1>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>
                            <span class="float-right my-auto mr-auto">

											<span class="text-white op-7"> </span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-7"></span>
            </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='clients') }}">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-5 pt-5 pr-5 pb-5 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h1 class="tx-20 font-weight-bold mb-1 text-white" style="padding-right: 245px;">العملاء
                                </h1>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>
                            <span class="float-right my-auto mr-auto">

											<span class="text-white op-7"> </span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-7"></span>
            </div>
            </a>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-xm-12">
            <a href="{{ url('/' . $page='suppliers') }}">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-5 pt-5 pr-5 pb-5 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white"></h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h1 class="tx-20 font-weight-bold mb-1 text-white" style="padding-right: 245px;">الموردين</h1>
                                <p class="mb-0 tx-12 text-white op-7"></p>
                            </div>
                            <span class="float-right my-auto mr-auto">

											<span class="text-white op-7"> </span>
										</span>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-7"></span>
            </div>
            </a>
        </div>
    </div>
    <!-- /row -->
    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('assets/js/dashboard.sampledata.js')}}"></script>
    <script src="{{URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
    <!--Internal Apexchart js-->
    <script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL::asset('assets/js/modal-popup.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{URL::asset('assets/js/index.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
