
<!DOCTYPE html>
<html>
<head>
	<title>Stripe Payment</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="icon" type="image/png" href="/img/fav.PNG">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style type="text/css">
        .panel-title {
        display: inline;
        font-weight: bold;
        }
        .display-table {
            display: table;
        }
        .display-tr {
            display: table-row;
        }
        .display-td {
            display: table-cell;
            vertical-align: middle;
            width: 100%;
        }
        body{
            background: #edf0f5;
        }
    </style>
</head>
<body>
  
<div class="container">
  
  
    <div class="row">
   

        <div class="col-md-6 col-md-offset-3 ">

           
            <br>
            <div class="panel panel-default credit-card-box">
                <h3 class="text-info text-center"> <img src="https://dashboard.teflonhub.com/images/logo.png" alt="" height="125"></h3>
                <div class="panel-body">
 
                    <form role="form" action='{{url("/teflon/accept/payment")}}' method="post" autocomplete="false">
                        @include("errors.showerrors")
                        @csrf
  
                    
                        <input type="hidden" name="id" value="{{$application->id}}">
  
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Card Number</label> <input name ="card"
                                    autocomplete='off' class='form-control' onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength='20'
                                    type='text' required>
                            </div>
                        </div>
  
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group'>
                                <label class='control-label'>CVC</label> <input autocomplete='off' name="cvv"
                                    class='form-control' placeholder='ex. 311' onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength='4'
                                    type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group required'>
                                <label class='control-label'>Expiration Month</label>
                                <input class='form-control' name="month"placeholder='MM' onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"  maxlength='2' type='text' required>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Expiration Year</label> <input name="year"
                                    class='form-control' placeholder='YY' onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength='2' required 
                                    type='text'>
                            </div>
                        </div>
                         <div class='form-row row'>
                            <div class='col-xs-12 col-md-12 form-group'>
                                <label class='control-label'>PIN</label> 
                                <input type="password" class="form-control" name="pin" required id="" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" maxlength='5' autocomplete="new-password">
                            </div>
                            
                        </div>
  
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay (₦{{$application->payment->price}})</button>
                            </div>
                        </div>
                          
                    </form>
                </div>
            </div>        
        </div>
    </div>
      
</div>
  
</body>
  

</html>