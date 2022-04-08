@extends('layouts.login')
@section('style')
<link href="/assets/css/authentication.css" rel="stylesheet" type="text/css" />
<style>
    .modal-backdrop.show {
        display:none !important
    }
    .modal-backdrop {
        position:inherit !important
    }
</style>
@endsection

@section('content')

                            <!-- form -->
                            <form action="{{url('form/fill/submit')}}" method="POST" enctype="multipart/form-data">
                                @include("errors.showerrors")

                                @csrf
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-sm-6 mt-2">
                                            <label for="fullname" class="form-label">First Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="fullname" name="first_name" value="{{old('first_name')}}" placeholder="Enter your name" required onkeydown="return /[a-z]/i.test(event.key)" maxlength='15'>
                                        </div>
                                        <div class="col-sm-6 mt-2">
                                           <label for="fullname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" id="fullname" name="last_name"  value="{{old('last_name')}}" placeholder="Enter your name" required onkeydown="return /[a-z]/i.test(event.key)" maxlength='15'>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" id="emailaddress" name="email"  value="{{old('email')}}" required placeholder="Enter your email" >
                                </div>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Phone No <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id="phone" name="phone_no"  value="{{old('phone_no')}}" required placeholder="Enter your Phone number" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength='14'>
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                    <input class="form-control" type="date" id="date"  value="{{old('date_of_birth')}}" name="date_of_birth" required >
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">State of Origin <span class="text-danger">*</span></label>
                                   <select name="state_id" class="form-control" id="state" onchange="getLga()">
                                       <option value="">Please select a state</option>
                                       @foreach($states as $state)
                                            <option value="{{$state->id}}" @if(old('state_id') == $state->id ) selected @endif>{{$state->name}}</option>
                                       @endforeach
                                   </select>
                                </div>
                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">LGA <span class="text-danger">*</span></label>
                                   <select name="lga_id" class="form-control" id="lga">
                                       <option value="">Select a local government area </option>
                                      
                                   </select>
                                </div>

                                <div class="mb-3">
                                    <label for="emailaddress" class="form-label">Ward Level <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" id=""  value="{{old('ward')}}" name="ward" required >
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
                                        <label class="form-check-label">  <input type="radio" id="customRadio1" name="form_id" value="{{$form->id}}" onclick="getFormTypes()" required
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
                                    <label for="emailaddress" class="form-label">Mode of Payment</label>
                                    
                                        <div class="form-check mb-2">
                                            <label class="form-check-label">  <input type="radio"  id="customRadio1" name="payment_type" value="Flutterwave" required onclick="getTeflonTypes()"
                                                    class="form-check-input">  Flutterwave <img src="https://africareinvented.com/wp-content/uploads/2021/03/Flutterwave-Logo-2.jpg"  alt="" height="20">
                                              </label>
                                        </div>
                                       
                                        <!-- <div class="form-check">
                                            <label class="form-check-label">  <input type="radio" id="customRadio1" name="payment_type" value="Bema-Switch" onclick="getTeflonTypes()"
                                                    class="form-check-input">  Bema-Switch <img src="https://dashboard.teflonhub.com/images/logo.png" alt="" height="20">
                                              </label>
                                        </div> -->
                                
                                </div>

                                <div class="mb-3" id="teflon-options" style="display:none">
                                    
                                </div>

                                <div class="text-center d-grid">
                                    <button class="btn btn-success" type="submit"> Submit </button>
                                </div>

                            </form>

                            <div class="modal fade" id="bs-example-modal-md" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md modal-center">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color: orange">
                                                        <h4 class="modal-title" id="mySmallModalLabel">Requirements</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        ...
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->          

                       

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
            $position.append($("<label for='emailaddress' class='form-label'>Subcategories</label>"));
            console.log(data);
            $.each(data, function (key, value) {
                $position.append($("<div class='form-check'> <label class='form-check-label'> <input type='radio' id='customRadio1' name='position_id' value='"
                                        + value.id +"' class='form-check-input'>"+ value.name +" </label> <span class=''>(requirements  <a type='button' data-bs-toggle='modal' onclick='requirements("+value.form_position_id+")' data-bs-target='#bs-example-modal-md'> <i class='mdi mdi-eye'></i></a>)</span> </div> "));
            });
        }else{
            $position.show();
            $position.empty(); // remove radio options
            $position.append($("<p class='text-danger'> No Subcategories for this category</p>"));
        }
    });
}

function getTeflonTypes()
{
    var payment_type = document.querySelector('input[name="payment_type"]:checked').value;

    var $teflon = $("#teflon-options");

        if(payment_type == "Bema-Switch")
        {
            $teflon.show();
            $teflon.empty(); // remove old options  
            $teflon.append($("<label for='emailaddress' class='form-label'>Payment Type</label>"));          
            $teflon.append($("<div class='form-check'> <label class='form-check-label'> <input type='radio' id='customRadio1' name='charge_type' value='Card' class='form-check-input'>Card </label></div>"));
            $teflon.append($("<div class='form-check'> <label class='form-check-label'> <input type='radio' id='customRadio1' name='charge_type' value='Transfer' class='form-check-input'>Transfer </label></div>"));
        }else{
            $teflon.show();
            $teflon.empty(); // remove radio options
            
        }
}

function requirements($id)
{
    console.log($id);

    var $modal = $(".modal-body");
    var url = '/form/position/requirements/'+$id;
    $.get(url, function (data) {
        console.log(data);
        if(data.status != false)
        {
            console.log(data);
            $modal.empty(); // remove conteent
          
            $.each(data, function (key, value) {
                console.log(value);
                $modal.append($("<textarea readonly class='form-control' style='border:none' cols='30' rows='10'>"+value.requirements+"</textarea>"));
            });
        }else{
         
            $modal.empty(); // remove content
            $modal.ppend($("<p class='text-danger'> No Subcategories for this category</p>"));
        }
    });
}

function getLga()
{
    var state_id = document.getElementById('state').value;
    console.log(state_id);
    var $lga = $("#lga");
    
    var url = '/state/lgas/'+state_id;
    
    $.get(url, function (data) {
        console.log(data);
        if(data.status != false)
        {
           
            console.log(data);
            $.get(url, function (data) {

                $lga.empty(); // remove old options

                $lga.append($("<option value=''>Select a local government area </option>"));

                $.each(data, function (key, value) {

                    $lga.append($("<option></option>")
                        .attr("value", value.id).text(value.name));
                });

            });
        }else{
          
            $lga.empty(); // remove radio options
            $category.append($("<p class='text-danger'> No lga for this state</p>"));
        }
    });
}
</script>
@endsection
