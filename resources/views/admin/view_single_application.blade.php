@extends('layouts.admin')
@section('style')


@endsection
@section('content')
@include('partials.modals.positions')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <h4 class="page-title">Application Details</h4>
        </div>
    </div>
</div>

 <!-- end page title -->
 @include('errors.showerrors')
        <div class="row">
            <div class="col-12">
            <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title mb-3">Track payment</h4>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <h5 class="mt-0">Payment reference:</h5>
                                                    <p>{{$application->reference}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="mb-4">
                                                    <h5 class="mt-0">Payment Type:</h5>
                                                    <p>{{$application->payment_type}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="track-order-list">
                                            <ul class="list-unstyled">
                                                <li class="completed">
                                                    <h5 class="mt-0 mb-1">Booked Placed</h5>
                                                    <p class="text-muted">  {{ date('M d, Y H:i A', strtotime($application->created_at)) }}</p>
                                                </li>
                                                @if($application->status == 1)
                                                <li class="completed">
                                                    <h5 class="mt-0 mb-1 text-success">Paid</h5>
                                                    <p class="text-muted"> {{ date('M d, Y H:i A', strtotime($application->payment->created_at)) }}</p>
                                                </li>
                                                @else

                                                @endif
                                                
                                            </ul>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title mb-3">Applicant Information</h4>

                                                <h5 class="font-family-primary fw-semibold">{{$application->first_name}} {{$application->first_name}}</h5>
                                                
                                                <p class="mb-2"><span class="fw-semibold me-2">Email:</span>{{$application->email}}</p>
                                                <p class="mb-2"><span class="fw-semibold me-2">Phone:</span> {{$application->phone_no}}</p>
                                                <p class="mb-0"><span class="fw-semibold me-2">D.O.B:</span> {{ date('M d, Y', strtotime($application->date_of_birth)) }}</p>
                                                @if(count($application->document) > 0)
                                                <div class="mt-4">
                                                @foreach($application->document as $document)
                                                    @php
                                                        $imageExtensions = ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz'];
                                                        $explodeImage = explode('.', $document->url);
                                                      
                                                        $extension = end($explodeImage);

                                                        if(in_array($extension, $imageExtensions))
                                                        {
                                                            $check = "yes";
                                                        }else
                                                        {
                                                            $check = "no";
                                                        }
                                                    @endphp
                                                    
                                                    <a href="{{$document->url}}" class="btn btn-success" download>
                                                      @if($check == "yes") 
                                                        Download Image
                                                      @else
                                                        Download File
                                                      @endif
                                                    </a>
                                                @endforeach
                                                </div>
                                                 @endif
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="header-title mb-3">Form Information</h4>

                                                <ul class="list-unstyled mb-0">
                                                    <li>
                                                        <p class="mb-2"><span class="fw-semibold me-2">Form:</span> {{$application->form ? $application->form->name : null}}</p>
                                                        <p class="mb-2"><span class="fw-semibold me-2">Category:</span> {{$application->category ? $application->category->name : null}}</p>
                                                        <p class="mb-2"><span class="fw-semibold me-2">Subcategory:</span>  {{$application->position ? $application->position->name : null}}</p>
                                                        <p class="mb-0"><span class="fw-semibold me-2">Amount:</span> N   {{$application->payment ? number_format($application->payment->amount_paid) : null}} </p>
                                                    </li>
                                                </ul>
                    
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                
                
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
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
