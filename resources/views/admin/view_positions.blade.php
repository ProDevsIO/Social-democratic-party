@extends('layouts.admin')
@section('style')
<style>
    .pending-campaigns:hover {
        transform: scale(1.05);
        box-shadow: 0 0 45px 0 rgba(0, 0, 0, 0.32);

    }

    .pending-campaigns {
        cursor: pointer;
        transition-duration: .7s;
    }
</style>

@endsection
@section('content')
@include('partials.modals.positions')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">positions</h4>
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
                                        class="mdi mdi-plus-circle me-2"></i> Add positions</a>
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
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach($positions as $position)
                                        <tr>
                                            <td class="table-user">
                                                {{$position->name}}
                                            </td>
                                        </tr>
                                        @endforeach 
                                </tbody>
                            </table>
                            @else
                                    <h4 class="text-center">No positions created yet</h4>
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
