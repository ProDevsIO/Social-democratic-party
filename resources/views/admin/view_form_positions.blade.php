@extends('layouts.admin')
@section('style')


<!-- third party css -->
<link href="/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet"
    type="text/css" />
<link href="/assets/libs/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/libs/selectize/css/selectize.bootstrap3.css" rel="stylesheet" type="text/css" />
<!-- third party css end -->

@endsection
@section('content')
@include('partials.modals.form_position')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">Form Subcategories for {{ $form->name }}</h4>
        </div>
    </div>
</div>

 <!-- end page title -->
 @include('errors.showerrors')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                            
                                <a type="button" data-bs-toggle="modal" data-bs-target="#addform"  class="btn btn-success mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Forms Subcategories</a>
                            </div>
                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                            @php
                            $o_form = $form;
                            @endphp
                      
                        @if(count($formPositions) > 0)
                            <table class="table table-centered table-striped dt-responsive nowrap w-100"
                                id="data_table">
                                <thead>
                                    <tr>

                                        <th>Subcategories</th>
                                        <th>Category</th>
                                        <th>Fee</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                   
                                        @foreach($formPositions as $form)
                                        <tr>

                                            <td class="table-user">
                                                {{optional(optional($form)->position)->name}}
                                            </td>
                                            <td >
                                          
                                                {{optional(optional($form)->category)->name}}
                                            </td>
                                            <td>
                                            NGN {{number_format($form->fee)}}
                                            </td>
                                            <td>
                                                 <div class="dropdown">
                                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action <i class="mdi mdi-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editform_{{$form->id}}">Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0);" onclick="action('{{$form->id}}', '/admin/form/position/delete/')" >Delete</a>
                                                            </div>
                                                 </div>
                                            </td>
                                        </tr>

                                        <div id="editform_{{$form->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <form action="{{ url('/admin/form/position/edit/'.$form->id) }}" method="post">
                                                 @csrf
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel">Edit Form Subcategories </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class=" row">
                                                           <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                  <label for="first_name" class="form-label">Categories*</label>
                                                                   <select name="category_id" id="" class="form-control" required>
                                                                       <option value="">Please select a category</option>
                                                                        @foreach($categories as $category)
                                                                        <option value="{{$category->id}}" @if(old('category_id') == $category->id ) 
                                                                            selected
                                                                            @elseif($form->category_id == $category->id)
                                                                            selected
                                                                            @endif>{{$category->name}}</option>
                                                                        @endforeach
                                                                   </select>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="form_id" value="{{$o_form->id}}">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Subcategories*</label>
                                                                   <select name="positon_id" id="" class="form-control" required>
                                                                   <option value="">Please select a subcatgory</option>
                                                                        @foreach($positions as $position)
                                                                        <option value="{{$position->id}}" @if(old('positon_id') == $position->id ) 
                                                                            selected
                                                                            @elseif($form->positon_id == $position->id)
                                                                            selected
                                                                            @endif>{{$position->name}}</option>
                                                                        @endforeach
                                                                   </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Requirements*</label>
                                                                <br>
                                                                
                                                                <textarea name="requirements" id="" class="form-control" cols="30" rows="10" required>{{old('requirements') ?? $form->requirements}}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                <label for="first_name" class="form-label">Fee*</label>
                                                                <br>
                                                                <span class="text-danger">Mininum amount of 200</span>
                                                                <input required name="fee" type="number" min="200" value="{{old('fee') ?? $form->fee}}"
                                                                        class="form-control" placeholder="Enter position fee" required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    </div>
                                                </form>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        @endforeach
                                   
                                    
                                </tbody>
                            </table>
                            @else
                                    <h4 class="text-center">No Forms Subcategoriess created yet</h4>
                            @endif
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

@endsection
@section('script')
<script src="/assets/libs/apexcharts/apexcharts.min.js"></script>
<!-- third party js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
<script src="/assets/libs/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js"></script>
<!-- third party js ends -->

<!-- Datatables init -->
<script src="/assets/js/pages/agents.init.js"></script>
<script>
    $(document).ready(function () {
        console.log('hey');
            $('#data_table').DataTable({
                "order": []
            });
        });
    function action(id, url){
            var d = confirm("Are you sure you want to carry out this action?");

            if (d) {
                window.location = url + id;
            }

        }
</script>

@endsection
