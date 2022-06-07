@extends('layouts.master')
@section('title')
    المنتجات
@endsection
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    @if(session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session()->has('update'))
        <div  class="col-md-12 alert alert-success show text-center" role="alert">
        <strong>{{session()->get('update')}}</strong>
        <button type="button"class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    @if(session()->has('delete'))
        <div  class="col-md-12 alert alert-danger show text-center" role="alert">
        <strong>{{session()->get('delete')}}</strong>
        <button type="button"class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    @endif
    @if(session()->has('Error'))
        <div class="alert alert-danger show" role="alert">
            <strong>{{session()->get('Error')}}</strong>
            <button type="button"class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- row -->
    <div class="row">

        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="button x-small btn-outline-success btn-block" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i>&nbsp; اضافة منتج</button><br><br>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                            <tr>
                                <th class="border-bottom-0">#</th>
                                <th class="border-bottom-0">اسم المنتج</th>
                                <th class="border-bottom-0">اسم القسم</th>
                                <th class="border-bottom-0">سعر البيع</th>
                                <th class="border-bottom-0">عدد المخزن</th>
                                <th class="border-bottom-0"> تاريخ الاضافه</th>
                                <th class="border-bottom-0">تاريخ التعديل</th>
                                <th class="border-bottom-0">ملاحظات</th>
                                <th class="border-bottom-0">العمليات</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($products as $Products)
                                <?php $i++ ?>
                                <tr>

                                    <td>{{ $i }}</td>
                                    <td>{{$Products->product_name}}</td>
                                    <td>{{$Products->category->category_name }}</td>
                                    <td>{{$Products->price}}</td>
                                    <td>{{$Products->stock}}</td>
                                    <td>{{$Products->created_at}}</td>
                                    <td>{{$Products->updated_at}}</td>
                                    <td>{{$Products->description}}</td>
                                   {{--<td>{{ $Products->categories->category_name }}</td>--}}
                                    <td>
                                        <button class="btn btn-outline-success btn-sm"
                                                data-name="{{ $Products->product_name }}" data-pro_id="{{ $Products->id }}"
                                                data-section_name="{{$Products->category->category_name }}" data-price="{{ $Products->price }}"
                                                data-description="{{ $Products->description }}" data-toggle="modal"
                                                data-target="#edit_Product">تعديل</button>

                                        <button class="btn btn-outline-danger btn-sm " data-pro_id="{{ $Products->id }}"
                                                data-product_name="{{ $Products->product_name }}" data-toggle="modal"
                                                data-target="#modaldemo9">حذف</button>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- add -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 623px; margin: 14.75rem auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">اضافة منتج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('products.store')}}" method="post">
                        {{csrf_field()}}

                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">اسم المنتج</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" required >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">سعر المنتج</label>
                                <input type="text" class="form-control" id="price" name="price" required >
                            </div>
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>
                            <select name="categories_id" id="categories_id" class="form-control" required>
                                <option value="" selected disabled> --حدد القسم--</option>
                                @foreach ($categores as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">ملاحظات</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">تاكيد</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- edit -->
        <div class="modal fade" id="edit_Product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 623px; margin: 14.75rem auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تعديل منتج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action='products/update' method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="title">اسم المنتج :</label>

                                <input type="hidden" class="form-control" name="pro_id" id="pro_id" value="">

                                <input type="text" class="form-control" name="Product_name" id="Product_name">
                            </div>

                            <div class="form-group">
                                <label for="title">سعر المنتج :</label>
                                <input type="text" class="form-control" name="price" id="price">
                            </div>

                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">القسم</label>

                            <select name="category_name" id="category_name" class="custom-select my-1 mr-sm-2" required>
                                @foreach ($categores as $category)
                                    <option>{{ $category->category_name }}</option>
                                @endforeach
                            </select>

                            <div class="form-group">
                                <label for="des">ملاحظات :</label>
                                <textarea name="description" cols="20" rows="5" id='description'
                                          class="form-control"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">تعديل البيانات</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- delete -->
        <div class="modal fade" id="modaldemo9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 623px; margin: 14.75rem auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">حذف المنتج</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="products/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>هل انت متاكد من عملية الحذف ؟</p><br>
                            <input type="hidden" name="pro_id" id="pro_id" value="">
                            <input class="form-control" name="product_name" id="product_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                            <button type="submit" class="btn btn-danger">تاكيد</button>
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
    <!-- Internal Prism js-->
    <script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>


    <script>
        $('#edit_Product').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var Product_name = button.data('name')
            var category_name = button.data('category_name')
            var price = button.data('price')
            var pro_id = button.data('pro_id')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #Product_name').val(Product_name);
            modal.find('.modal-body #section_name').val(category_name);
            modal.find('.modal-body #price').val(price);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #pro_id').val(pro_id);
        })


        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var product_name = button.data('product_name')
            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id);
            modal.find('.modal-body #product_name').val(product_name);
        })

    </script>

@endsection
