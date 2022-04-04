@extends('layouts.admin')
@section('style')


@endsection
@section('content')
@include('partials.modals.forms')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">Forms</h4>
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
                                        class="mdi mdi-plus-circle me-2"></i> Add Forms</a>
                            </div>
                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                        @if(count($forms) > 0)
                            <table class="table table-centered table-striped dt-responsive nowrap w-100"
                                id="products-datatable">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                   
                                        @foreach($forms as $form)
                                        <tr>

                                            <td class="table-user">
                                                {{$form->name}}

                                            </td>
                                            <td>
                                                 <div class="dropdown">
                                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action <i class="mdi mdi-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="/admin/form/position/view/{{$form->id}}">View Positons</a>
                                                                
                                                            </div>
                                                 </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                   
                                    
                                </tbody>
                            </table>
                            @else
                                    <h4 class="text-center">No Forms created yet</h4>
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

@endsection
