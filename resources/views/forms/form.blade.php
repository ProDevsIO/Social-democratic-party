@extends('layouts.form')
@section('style')
<link href="/assets/css/authentication.css" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-6">
                @include('errors.showerrors')
                    <div class="card bg-pattern">

                        <div class="card-body p-4">
                            
                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                        <img src="/assets/images/sdp_new_logo.png" class="img-fluid avatar-xl rounded" alt="" height="70">
                                        </span>
                                    </a>
                
                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="/assets/images/sdp_new_logo.png" class="img-fluid avatar-xl rounded" alt="" height="70">
                                        </span>
                                    </a>
                                </div>
                               
                            </div>

                            <form action="{{url('form/fill/submit')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6 mt-2">
                                            <label for="fullname" class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="fullname" name="first_name" value="{{old('first_name')}}" placeholder="Enter your name" required>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                           <label for="fullname" class="form-label">last Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="fullname" name="last_name"  value="{{old('last_name')}}" placeholder="Enter your name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email address <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" id="emailaddress" name="email"  value="{{old('email')}}" required placeholder="Enter your email">
                                </div>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Phone No <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="phone" name="phone_no"  value="{{old('phone_no')}}" required placeholder="Enter your Phone number">
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Date of birth <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" id="date"  value="{{old('date_of_birth')}}" name="date_of_birth" required >
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Image</label>
                                    <input class="form-control" type="file" id="date" name="image" accept="image/png, image/jpg, image/jpeg" />
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Attachment</label>
                                    <input class="form-control" type="file" id="date" name="attachment" accept="application/pdf,application/vnd.ms-excel,application/pdf">
                                </div>

                               
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Form Types</label>
                                    @foreach($forms as $form)
                                        <div class="form-check">
                                        <label class="form-check-label">  <input type="radio" id="customRadio1" name="form_id" value="{{$form->id}}" onclick="getFormTypes()"
                                                    class="form-check-input">
                                               {{$form->name}}</label>
                                            </div>
                                    @endforeach
                                </div>

                                <div class="mb-3" id="category" style="display:none">
                                    
                                </div>

                                <div class="mb-3" id="position" style="display:none">
                                    
                                </div>

                                <div class="mb-3" id="payment" >
                                    <label for="emailaddress" class="form-label">Form Payment</label>
                                    
                                        <div class="form-check">
                                            <label class="form-check-label">  <input type="radio" checked id="customRadio1" name="payment_type" value="flutterwave" 
                                                    class="form-check-input">  Flutterwave <img src="https://africareinvented.com/wp-content/uploads/2021/03/Flutterwave-Logo-2.jpg"  alt="" height="20">
                                              </label>
                                        </div>
                                
                                </div>

                                <div class="text-center d-grid">
                                    <button class="btn btn-success" type="submit"> Submit </button>
                                </div>

                            </form>

                           

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                  
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->

@endsection
@section('script')
<script>

function getFormTypes() {

    var form_id = document.querySelector('input[name="form_id"]:checked').value;
    console.log(form_id);
    var $category = $("#category");
    var $position = $("#position");
    var url = '/form/fill/category/'+form_id;
    
    $.get(url, function (data) {
        console.log(data);
        if(data.status != false)
        {
            $category.show();
            $category.empty(); // remove old options
            $category.append($("<label for='emailaddress' class='form-label'>Categories</label>"));
            console.log(data);
            $.each(data, function (key, value) {
                  $category.append($("<div class='form-check'> <label class='form-check-label'> <input type='radio' id='customRadio1' name='category_id' value='"
                                        + value.id +"' onclick='getCategory()' class='form-check-input'>"+ value.name +"</label></div>"));
            });
        }else{
            $position.empty();
            $position.hide();
            $category.show();
            $category.empty(); // remove radio options
            $category.append($("<p class='text-danger'> No category for this form</p>"));
        }
    });
}

function getCategory()
{
    var category_id = document.querySelector('input[name="category_id"]:checked').value;
    var form_id = document.querySelector('input[name="form_id"]:checked').value;
    console.log(form_id,category_id);
    var $position = $("#position");
    var url = '/form/fill/position/'+form_id+'/'+category_id;
    $.get(url, function (data) {
        console.log(data);
        if(data.status != false)
        {
            $position.show();
            $position.empty(); // remove old options
            $position.append($("<label for='emailaddress' class='form-label'>Positions</label>"));
            console.log(data);
            $.each(data, function (key, value) {
                $position.append($("<div class='form-check'> <label class='form-check-label'> <input type='radio' id='customRadio1' name='position_id' value='"
                                        + value.id +"' class='form-check-input'>"+ value.name +" </label></div>"));
            });
        }else{
            $position.show();
            $position.empty(); // remove radio options
            $position.append($("<p class='text-danger'> No position for this category</p>"));
        }
    });
}
</script>
@endsection
