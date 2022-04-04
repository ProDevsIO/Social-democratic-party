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

            <h4 class="page-title">Form Positions for {{ $form->name }}</h4>
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
                                        class="mdi mdi-plus-circle me-2"></i> Add Forms Positions</a>
                            </div>
                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                        @if(count($formPositions) > 0)
                            <table class="table table-centered table-striped dt-responsive nowrap w-100"
                                id="data_table">
                                <thead>
                                    <tr>

                                        <th>Position</th>
                                        <th>Category</th>
                                        <th>Fee</th>
                                        <!-- <th>Action</th> -->
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
                                            ₦ {{number_format($form->fee)}}
                                            </td>
                                            <!-- <td>
                                                 <div class="dropdown">
                                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action <i class="mdi mdi-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="editPosition_{{$form->id}}">Edit Positon</a>
                                                                
                                                            </div>
                                                 </div>
                                            </td> -->
                                        </tr>
                                        @endforeach
                                   
                                    
                                </tbody>
                            </table>
                            @else
                                    <h4 class="text-center">No Forms Positions created yet</h4>
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
