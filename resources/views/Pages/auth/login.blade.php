@extends('layouts.auth')
@section('content')
   <div class="login_box">
      <div class="left">
         <div class="contact">
            <form id="loginForm">
               <h3>SIGN IN</h3>
               <div id="emailDiv" class="inputDiv">
                  <input type="text" class="inputData" name="email" placeholder="E-MAIL">
                  <span class="invalid-feedback" role="alert"></span>
               </div>
               <div id="passwordDiv" class="inputDiv">
                  <input type="password" class="inputData" name="password" placeholder="PASSWORD">
                  <span class="invalid-feedback" role="alert"></span>
               </div>
               <div class="login_btn_area">
                  <button type="button" id="submit" class="btn submit" data-type="login">LOGIN</button>
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
@stop