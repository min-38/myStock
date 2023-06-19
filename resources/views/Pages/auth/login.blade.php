@extends('layouts.auth')
@section('content')
   <div class="login_box">
      <div class="left">
         <div class="contact">
            <form>
               <h3>SIGN IN</h3>
               <input type="text" placeholder="E-MAIL">
               <input type="password" placeholder="PASSWORD">
               <div class="login_btn_area">
                  <button type="button" class="btn submit">LOGIN</button>
                  <button type="button" class="btn signup">SIGN UP</button>
               </div>
            </form>
         </div>
      </div>
      <div class="right company">
         <div class="right-text">
            <h2>MyStock</h2>
            <h5>Check & Manage your stocks<br>
            Our site helps you view stocks more comfortably.<br>You cannot buy or sell stocks.<br>
            Our site continues to make efforts to improve UI and performance.<br>
            If you have any inconvenience, please contact the email address below.
            </h5>
         </div>
      </div>
   </div>

   <script>
         document.querySelector(".btn.signup").addEventListener("click", function() {
            location.href="/signup";
         });
   </script>
@stop