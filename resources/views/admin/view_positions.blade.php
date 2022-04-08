@extends('layouts.admin')
@section('style')


@endsection
@section('content')
@include('partials.modals.positions')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">Subcategories</h4>
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
                            
                                <a type="button" data-bs-toggle="modal" data-bs-target="#addposition"  class="btn btn-success mb-2"><i
                                        class="mdi mdi-plus-circle me-2"></i> Add Subcategories</a>
                            </div>
                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                        @if(count($positions) > 0)
                            <table class="table table-centered table-striped dt-responsive nowrap w-100"
                                id="products-datatable">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($positions as $position)
                                        <tr>
                                            <td class="table-user">
                                                {{$position->name}}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action <i class="mdi mdi-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editposition{{$position->id}}">Edit</a>
                                                                <a class="dropdown-item" href="javascript:void(0);" onclick="action('{{$position->id}}', '/admin/position/delete/')" >Delete</a>
                                                                
                                                            </div>
                                                 </div>
                                            </td>
                                        </tr>
                                      
                                       <div id="editposition{{$position->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <form action="position/edit/{{$position->id}}" method="post">
                                                 @csrf
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="standard-modalLabel">Edit Subcategories</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class=" row">
                                                            <div class="col-lg-12">
                                                                <div class="mb-3">
                                                                    <label for="first_name" class="form-label">Name*</label>
                                                                    <input required name="name" type="text" value="{{old('name') ?? $position->name}}"
                                                                        class="form-control" placeholder="Enter Name" required>
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
                                    <h4 class="text-center">No Subcategories created yet</h4>
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
<script>
    $(document).ready(function () {
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
