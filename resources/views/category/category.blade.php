
@extends('layouts.master')
@section('title')
  الاقسام
@endsection
@section('css')
    <link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{URL::asset('assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto"> الاقسام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمه الاقسام </span>
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
                        <div  class="col-md-12 alert alert-success show text-center" role="alert">
                            <strong>{{session()->get('Add')}}</strong>
                            <button type="button"class="close" data-dismiss="alert" aria-label="Close">
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
                        <div  class="col-md-12 alert alert-danger show text-center" role="alert" >
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

                        <!--div-->
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    <div class="col-sm-6 col-md-12 col-xl-12">
                                        <a class="modal-effect btn btn-outline-success  btn-block" data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافه قسم</a>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table key-buttons text-md-nowrap">
                                            <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">اسم القسم</th>
                                                <th class="border-bottom-0">الوصف</th>
                                                <th class="border-bottom-0"> تاريخ الاضافه</th>
                                                <th class="border-bottom-0">تاريخ التعديل</th>
                                                <th class="border-bottom-0">مضاف بواسطة</th>
                                                <th class="border-bottom-0">العمليات</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($categorys as $category)
                                                     <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$category->category_name}}</td>
                                                        <td>{{$category->description}}</td>
                                                        <td>{{$category->created_at}}</td>
                                                        <td>{{$category->updated_at}}</td>
                                                        <td>Name : {{$category->create_by}}</td>
                                                        <td>
                                                            <button class="btn btn-outline-success btn-sm" data-effect="effect-scale"
                                                               data-id="{{ $category->id }}" data-category_name="{{ $category->category_name }}"
                                                               data-description="{{ $category->description }}" data-toggle="modal" href="#update-model-{{ $category->id }}"
                                                               title="تعديل" >تعديل</button>
                                                            <!-- Modal edite categories  effects -->
                                                            <div class="modal" id="update-model-{{ $category->id }}">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                    <div class="modal-content modal-content-demo">

                                                                        <form method="post" action="{{ route('categories.update', $category) }}">
                                                                            @method('PATCH')
                                                                            @csrf
                                                                            <div class="modal-header">
                                                                                <h6 class="modal-title"> تعديل قسم</h6>

                                                                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>

                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label>اسم القسم</label>
                                                                                    <input value="{{ $category->category_name }}"  type="text" id="category_name" class="form-control" name="category_name" required autocomplete="off" >
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>الملاحظات</label>
                                                                                    <textarea  role="5" class="form-control" id="description" name="description"  autocomplete="off" >{{ $category->description }}</textarea>
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


                                                            <button class="btn btn-outline-danger btn-sm " data-effect="effect-scale"
                                                               data-id="{{ $category->id }}" data-category_name="{{ $category->category_name }}" data-toggle="modal"
                                                               href="#modaldemo10" title="حذف" >حذف</button>
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
            <div class="modal" id="modaldemo8">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">

                        <form method="post" action="{{route('categories.store')}}">
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title">اضافه قسم</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>اسم القسم</label>
                                    <input  type="text" class="form-control" name="category_name" required autocomplete="اسم القسم" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>الملاحظات</label>
                                    <textarea  role="5" class="form-control" name="description"  autocomplete="الوصف" autofocus></textarea>
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

                        <form method="post" action="categories/destroy">
                            {{method_field('delete')}}
                            @csrf
                            <div class="modal-header">
                                <h6 class="modal-title"> هل انت متاكد من حذف القسم ؟</h6>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <input  value="" type="hidden" id="id" name="id">
                                    <input  type="text" id="category_name" class="form-control" name="category_name" readonly>
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
        $('#modaldemo9').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var category_name = button.data('category_name')
            var description = button.data('description')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #category_name').val(category_name);
            modal.find('.modal-body #description').val(description);
        })
    </script>

    <script>
        $('#modaldemo10').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var category_name = button.data('category_name')
            var  modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #category_name').val(category_name);
        })
    </script>

@endsection
