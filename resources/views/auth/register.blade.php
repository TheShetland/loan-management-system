<x-guest-layout>
   
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                  <!--Register-->
                  <center>
                  <br>
<div style="font-weight:bolder;font-size:22px; color:black">Sign Up First.</div>
</center>
            </a>
        </x-slot>

      




       
<style>

body {
    background: #eee
}

#regForm {
    background-color: #ffffff;
    margin: 0px auto;
    font-family: Raleway;
    padding: 40px;
    border-radius: 10px
}

#register{

  color: #6A1B9A;
}

h1 {
    text-align: center
}

input {
    padding: 10px;
    width: 100%;
    font-size: 17px;
    font-family: Raleway;
    border: 1px solid #aaaaaa;
    border-radius: 10px;
    -webkit-appearance: none;
}



.tab input:focus{

  border:1px solid #6a1b9a !important;
  outline: none;
}

input.invalid {
 
    border:1px solid #e03a0666;
}

.tab {
    display: none
}

button {
    background-color: #6A1B9A;
    color: #ffffff;
    border: none;
    border-radius: 50%;
    padding: 10px 20px;
    font-size: 17px;
    font-family: Raleway;
    cursor: pointer
}

button:hover {
    opacity: 0.8
}

button:focus{

  outline: none !important;
}

#prevBtn {
    background-color: #bbbbbb
}


.all-steps{
      text-align: center;
    margin-top: 30px;
    margin-bottom: 30px;
    width: 100%;
    display: inline-flex;
    justify-content: center;
}

.step {
       height: 40px;
    width: 40px;
    margin: 0 2px;
    background-color: #bbbbbb;
    border: none;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 15px;
    color: #6a1b9a;
    opacity: 0.5;
}

.step.active {
    opacity: 1
}


.step.finish {
   color: #fff;
   background: #6a1b9a;
   opacity: 1;

}



.all-steps {
    text-align: center;
    margin-top: 30px;
    margin-bottom: 30px
}

.thanks-message {
    display: none
}
</style>



<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        
            
      
      
        <div class="col-md-8">

<center>
<img src="{{asset('images/eliana_logos/Capture.JPG')}}" width="160" height="100" alt="ElianaCashXpress" style="margin-top:20px;">
<br><br>
</center>
       


            <form id="regForm" method="POST" action="{{ route('register') }}">
             @csrf  
          <center>
                    <h1 id="register">Eliana CashXpress</h1>
                    <h4>Get a Loan From as Low as: </h4>
                   
                        <a href="#" class="btn btn-info btn-lg" style="font-weight:bold;font-size:16px">
                            <span class="glyphicon glyphicon-circle-arrow-right"></span> K500
                          </a>
                    
                   
                </center>
                
  <!-- Session Status -->
  <x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />
 <!--Warnings--> 
        
@if (Session('warnings'))
<div class="alert alert-danger alert-dismissible fade show " role="alert">
     <div class="font-medium text-600">
            <i class="fa-regular fa-bell"></i>
        <strong>Hello there!</strong> You have some bad feedbacks
        </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
           
            <div>
            {!! Session('warnings') !!}
    </div>
        
          </div>
     
@endif

                <div class="all-steps" id="all-steps"> 
                  <span class="step"><i class="fa fa-dollar"></i></span> 
                  <span class="step"><i class="fa fa-user"></i></span>
                  <span class="step"><i class="fa fa-industry"></i></span>
                  <span class="step"><i class="fa fa-user-plus"></i></span>
                  <span class="step"><i class="fa fa-file"></i></span>
                  <span class="step"><i class="fa fa-lock" ></i></span>
                  <span class="step"><i class="fa fa-tachometer"></i></span>
                </div>

                <div class="tab">
                <strong>Loan Details</strong>   
                <hr>            
<!--Loan Tab-->    
<div class="row">

    <div class="col-lg-6">
<div class="form-group">
            <label for="name"> Loan Amount </label> <small class="text-danger">*</small>

            <input class="form-control" type="number" onkeyup="calculateEMI()" id="amount" name="loan_amt"  />
          
        </div> 
</div>

        
      
 

            <!-- Tenure Months -->
            <div class="col-lg-6">
<div class="form-group">
            <label for="name">Pick Months </label> <small class="text-danger">*</small>
<!--Show the number of months to the user--> 
<select class="form-control" onchange="calculateEMI()" name="tenure_months" id="months" required>
  <option value=1>1 Month </option>
  <option value=2>2 Months</option>
  <option value=3>3 Months</option>
  <option value=4>4 Months</option>
  <option value=5>5 Months</option>
  <option value=6>6 Months </option>
 </select>
</div> 

</div>
</div>
 

           
  <input type="hidden" name="lower_facility_fee" value="100" class="form-control"  id="lower_facility_fee" readonly>
    
  
  
  
    <input type="hidden" name="higher_facility_fee" value="100" class="form-control"  id="higher_facility_fee" readonly>
   
  



 <!-- Loan Repayments Amount -->
 <div class="row">
 <div class="col-lg-6">
<div class="form-group">
            <label for="Total Repayments Amount"> Total Repayments </label> <small class="text-danger">*</small>

            <input class="form-control" type="number" id="total_repayments_amt" name="total_repayments_amt" readonly />
            </div> 

</div>

             <!-- EMI -->
             <div class="col-lg-6">
<div class="form-group">
            <label for="EMI">EMI </label> <small class="text-danger">*</small>

            <input class="form-control" type="number" id="emi"  name="emi" readonly/>
            </div> 
</div>
</div>

          
<!--Loan Percent-->  
<input id="loan_percent" class="form-control" type="hidden" id="hidden" value="6.69"  id="loan_percent" readonly/>







            
</div>



<!--End Loan Tab-->




              

<!--Contact Details-->

                <div class="tab">
                <strong>Personal Details</strong>   
                <hr>                
                <div class="row">
 <div class="col-lg-6">
<div class="form-group">
            <label for="First Name"> First Name </label> <small class="text-danger">*</small>

            <input class="form-control" type="text" id="firstname" name="firstname" required/>
            </div> 

</div>

             <!-- Last Name -->
             <div class="col-lg-6">
<div class="form-group">
            <label for="Last Name">Last Name</label> <small class="text-danger">*</small>

            <input class="form-control" type="text" id="lastname"  name="lastname"  required/>
            </div> 
</div>
</div>





<div class="row">
    <!-- NRC Number -->
 <div class="col-lg-6">
<div class="form-group">
            <label for="NRC"> NRC# </label> <small class="text-danger">*</small>

            <input class="form-control" type="text" id="nrc" name="nrc" required/>
            </div> 

</div>

             <!-- Date of Birth-->
             <div class="col-lg-6">
<div class="form-group">
            <label for="Date of Birth">DOB</label> <small class="text-danger">*</small>

            <input class="form-control" type="text" id="dob" name="dob" required/>
            </div> 
</div>
</div>




<div class="row">
    <!-- Email -->
 <div class="col-lg-6">
<div class="form-group">
            <label for="Emal"> Email </label> <small class="text-danger">*</small>

            <input class="form-control" type="email" id="email" name="email" required/>
            </div> 

</div>

             <!--Phone-->
             <div class="col-lg-6">
<div class="form-group">
            <label for="Phone">Phone</label> <small class="text-danger">*</small>

            <input class="form-control" type="text" id="phone" name="phone" required/>
            </div> 
</div>
</div>



<div class="row">
    
 <div class="col-lg-6">
 <!-- Province of Residence -->
 <div class="form-group">
    <label for="Province of Residence">Province of Residence</label> <small class="text-danger">*</small>
    <select class="form-control" name="province" required>
    <option value="Southern">Southern </option>
  <option value="Nothern">Nothern</option>
  <option value="Western">Western</option>
  <option value="Eastern">Eastern</option>
  <option value="North Western">North Western</option>
  <option value="Lusaka">Lusaka </option>
  <option value="Luapula">Luapula</option>
  <option value="Central">Central</option>
  <option value="Copperbelt">Copperbelt</option>
  <option value="Muchinga">Muchinga</option>
 
</select>
    
  </div>

</div>

             <!--Town-->
             <div class="col-lg-6">
<div class="form-group">
            <label for="Town">Town</label> <small class="text-danger">*</small>

            <input class="form-control" type="text" id="town" name="town" required/>
            </div> 
</div>
</div>




<div class="row">
   
             <!--Physical Address-->
             <div class="col-lg-12">
<div class="form-group">
            <label for="Address">Address</label> <small class="text-danger">*</small>

            <input class="form-control" type="text" id="address" name="address" required/>
            </div> 
</div>
</div>











                    
                </div>




                <div class="tab">
                <strong>Employeement Details</strong>   
                <hr>    
                 <div class="row">
  <div class="col-lg-6">
 <div class="form-group">
             <label for="Employee Number"> Employee# </label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="employee_number" name="employee_number" required/>
             </div> 
 
 </div>
 
              <!-- Last Name -->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Job Title">Job Title</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="job_title"  name="job_title"  required/>
             </div> 
 </div>
 </div>
 
 
 
 
 
 <div class="row">
     <!-- NRC Number -->
  <div class="col-lg-6">
 <div class="form-group">
             <label for="Ministry"> Ministry </label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="ministry" name="ministry" required/>
             </div> 
 
 </div>
 
              <!-- Basic Pay-->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Basic Pay">Basic Pay</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="basic" name="basic" required/>
             </div> 
 </div>
 </div>
 
 
 
 
 <div class="row">
     <!-- Net -->
  <div class="col-lg-6">
 <div class="form-group">
             <label for="Gross Pay"> Gross Pay </label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="gross" name="gross" required/>
             </div> 
 
 </div>
 
              <!--Net-->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Net">Net</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="net" name="net" required/>
             </div> 
 </div>
 </div>
 
 
 
 <div class="row">
     
  <div class="col-lg-6">
  <!-- Province of Residence -->
  <div class="form-group">
     <label for="Base Station">Base Station</label> <small class="text-danger">*</small>
     <select class="form-control" name="base_station" required>
     <option value="Southern">Southern </option>
   <option value="Nothern">Nothern</option>
   <option value="Western">Western</option>
   <option value="Eastern">Eastern</option>
   <option value="North Western">North Western</option>
   <option value="Lusaka">Lusaka </option>
   <option value="Luapula">Luapula</option>
   <option value="Central">Central</option>
   <option value="Copperbelt">Copperbelt</option>
   <option value="Muchinga">Muchinga</option>
  
 </select>
     
   </div>
 
 </div>
 
              <!--Town-->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Town">Work Town</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="town" name="town" required/>
             </div> 
 </div>
 </div>
 
 
 
 
 <div class="row">
    
              <!--Physical Address-->
              <div class="col-lg-12">
 <div class="form-group">
             <label for="Address">Work Physical Address</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="address" name="address" required/>
             </div> 
 </div>
 </div>
 
 
 
 
 
 
 
 
 
 
 
                     
                 </div>

                 




                 <div class="tab">
                <strong>Supervisor & Next of Kin</strong>   
                <hr>    
                 <div class="row">
  <div class="col-lg-6">
 <div class="form-group">
             <label for="Supervisors Name"> Supervisors Full Name </label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="employer_name" name="employer_name" required/>
             </div> 
 
 </div>
 
              <!-- Employer Number -->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Supervisors Number">Supervisors Number</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="employer_number"  name="employer_number"  required/>
             </div> 
 </div>
 </div>
 
 
 
 
 
 <div class="row">
     <!-- NRC Number -->
  <div class="col-lg-6">
 <div class="form-group">
             <label for="Ministry"> Ministry </label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="ministry" name="ministry" required/>
             </div> 
 
 </div>
 
              <!-- Next of Kin Firstname -->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Next of Kin First Name">Next of Kin First Name</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="nexofkin_firstname" name="nexofkin_firstname" required/>
             </div> 
 </div>
 </div>
 
 
 
 
 <div class="row">
     <!-- Next of Kin Last Name -->
  <div class="col-lg-6">
 <div class="form-group">
             <label for="Next of Kin Last Name"> Next of Kin Last Name </label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="nexofkin_lastname" name="nexofkin_lastname" required/>
             </div> 
 
 </div>
 
              <!--Next of Kin Number-->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Next of Kin Number">Next of Kin Number</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="nexofkin_lastname" name="nexofkin_lastname" required/>
             </div> 
 </div>
 </div>
 
 
 
 <div class="row">
     
  <div class="col-lg-6">
  <!-- Relationship with Next of Kin -->
  <div class="form-group">
     <label for="Relationship with Next of Kin">Relationship with Next of Kin</label> <small class="text-danger">*</small>
     <select class="form-control" name="base_station" required>
     <option value="Father">Father </option>
   <option value="Mother">Mother</option>
   <option value="Spouse">Spouse</option>
   <option value="Aunty">Aunty</option>
   <option value="Cousin">Cousin</option>
   <option value="Nephew">Nephew </option>
   <option value="Uncle">Uncle</option>
   <option value="Grand Mother">Grand Mother</option>
   <option value="Grand Father">Grand Father</option>
   <option value="Child">Child</option>
   <option value="Other">Other</option>
  
 </select>
     
   </div>
 
 </div>
 
              <!--Next of Kin Physical Address-->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Next of Kin Physical Address">Next of Kin Physical Address</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="nextofkin_address" name="nextofkin_address" required/>
             </div> 
 </div>
 </div>
 
 
 
 
 
                     
                 </div>











                 <div class="tab">
                <strong>Attachments</strong>   
                <hr>    
                 <div class="row">
  <div class="col-lg-6">
 <div class="form-group">
             <label for="Payslip1">Upload {{date('F-Y',strtotime('-1 month'))}} Payslip (PDF)</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="file" id="payslip1" name="payslip1" required/>
             </div> 
 
 </div>
 
              <!-- Payslip-2 -->
              <div class="col-lg-6">
 <div class="form-group">
 <label for="Payslip1">Upload {{date('F-Y',strtotime('-2 months'))}} Payslip (PDF)</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="file" id="file"  name="payslip2"  required/>
             </div> 
 </div>
 </div>
 
 
 
 
 
 <div class="row">
     <!-- Bank Statement -->
  <div class="col-lg-6">
 <div class="form-group">
             <label for="Bank Statement "> Bank Statement (PDF) </label> <small class="text-danger">*</small>
 
             <input class="form-control" type="text" id="bank_statement" name="bank_statement" required/>
             </div> 
 
 </div>
 
              <!-- Passport Photo -->
              <div class="col-lg-6">
 <div class="form-group">
             <label for="Passport Photo">Selfie (JPG/PNG)</label> <small class="text-danger">*</small>
 
             <input class="form-control" type="file" id="passport_photo" name="passport_photo" required/>
             </div> 
 </div>
 </div>
 
 
 
 
 <div class="row">
     <!-- NRC -->
  <div class="col-lg-6">
 <div class="form-group">
             <label for="NRC"> NRC (PDF) </label> <small class="text-danger">*</small>
 
             <input class="form-control" type="file" id="file" name="file" required/>
             </div> 
 
 </div>
 
              
 
                      
                 </div>

</div>









                <div class="tab">
                    <h6>Create Password</h6>
                    <p><input type="password" placeholder="Atleast 8 characters" oninput="this.className = ''" name="password" value="{{old('password')}}" autofocus></p>
                </div>
               <br>
                <div class="thanks-message text-center" id="text-message"> <img src="{{asset('images/eliana_logos/Capture.JPG')}}" width="120" height="100" class="mb-4">
                    <h3>Thank you for your feedback!</h3> <span>You are one step away from getting your Loan! Click on the Submit button below to get started.</span>
              <br>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                </div>
                <div style="overflow:auto;" id="nextprevious">
                    <div style="float:right;">
                      <button type="button" id="prevBtn" onclick="nextPrev(-1)"><i class="fa fa-angle-double-left"></i></button> 
                      <button type="button" id="nextBtn" onclick="nextPrev(1)"><i class="fa fa-angle-double-right"></i></button> </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
   var currentTab = 0;
              document.addEventListener("DOMContentLoaded", function(event) {


              showTab(currentTab);

              });

              function showTab(n) {
              var x = document.getElementsByClassName("tab");
              x[n].style.display = "block";
              if (n == 0) {
              document.getElementById("prevBtn").style.display = "none";
              } else {
              document.getElementById("prevBtn").style.display = "inline";
              }
              if (n == (x.length - 1)) {
              document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              } else {
              document.getElementById("nextBtn").innerHTML = '<i class="fa fa-angle-double-right"></i>';
              }
              fixStepIndicator(n)
              }

              function nextPrev(n) {
              var x = document.getElementsByClassName("tab");
              if (n == 1 && !validateForm()) return false;
              x[currentTab].style.display = "none";
              currentTab = currentTab + n;
              if (currentTab >= x.length) {
            
              document.getElementById("nextprevious").style.display = "none";
              document.getElementById("all-steps").style.display = "none";
              document.getElementById("register").style.display = "none";
              document.getElementById("text-message").style.display = "block";




              }
              showTab(currentTab);
              }

              function validateForm() {
                   var x, y, i, valid = true;
                   x = document.getElementsByClassName("tab");
                   y = x[currentTab].getElementsByTagName("input");
                   for (i = 0; i < y.length; i++) {
                       if (y[i].value == "") {
                           y[i].className += " invalid";
                           valid = false;
                       }


                   }
                   if (valid) {
                       document.getElementsByClassName("step")[currentTab].className += " finish";
                   }
                   return valid;
               }

               function fixStepIndicator(n) {
                   var i, x = document.getElementsByClassName("step");
                   for (i = 0; i < x.length; i++) {
                       x[i].className = x[i].className.replace(" active", "");
                   }
                   x[n].className += " active";
               }
</script>


<script>

  function calculateEMI() {


    var loan_percent = document.getElementById('loan_percent').value;
            if (!loan_percent)
            loan_percent = '0';



             var installments = document.getElementById('months').value;
            if (!installments)
                installments = '0';


                var loan_amount =document.getElementById('amount').value;
            if (!loan_amount)
                loan_amount = '0';
                
                
                 var lower_facility_fee =document.getElementById('lower_facility_fee').value;
            if (!lower_facility_fee)
                lower_facility_fee = '0';
                
                
                 var higher_facility_fee =document.getElementById('higher_facility_fee').value;
            if (!higher_facility_fee)
                higher_facility_fee = '0';


               


            var loan_amount = parseFloat(loan_amount);
            var loan_percent = parseFloat(loan_percent);
            var installments = parseFloat(installments);
            var lower_facility_fee = parseFloat(lower_facility_fee);
            var higher_facility_fee = parseFloat(higher_facility_fee);
            

            
            


if(loan_amount >= 200 && loan_amount <= 1000){
var total = (loan_amount+lower_facility_fee)+((loan_amount+lower_facility_fee)*(loan_percent/100)*installments);
 document.getElementById('total_repayments_amt').value = parseFloat(total).toFixed(2);
 document.getElementById('emi').value = parseFloat((total/installments)).toFixed(2);
}

if(loan_amount >= 1001 && loan_amount <= 10000){
var total = (loan_amount+higher_facility_fee)+((loan_amount+higher_facility_fee)*(loan_percent/100)*installments);
 document.getElementById('total_repayments_amt').value = parseFloat(total).toFixed(2);
 document.getElementById('emi').value = parseFloat((total/installments)).toFixed(2);
 document.getElementById('emi_terms').value = parseFloat((total/installments)).toFixed(2);
 document.getElementById('loan_amt_terms').value = loan_amount;
 document.getElementById('loan_amt_terms_conditions').value = loan_amount;
}
 
           
        }
      </script>















   
</x-guest-layout>
