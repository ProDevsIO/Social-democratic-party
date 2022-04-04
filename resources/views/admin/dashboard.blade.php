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

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>

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
