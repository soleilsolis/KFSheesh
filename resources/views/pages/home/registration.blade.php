<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   <title> Sign up to KF.Sheesh </title>
    <link rel="stylesheet" href="/css/registration.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form id="storeField">
        @csrf
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input name="full_name"  type="text" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input name="name"  type="text" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input  name="email" type="text" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input  name="phone_number" type="text" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input  name="password" type="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input  name="confirm-password" type="password" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="1">
          <input type="radio" name="gender" id="dot-2" value="2">
          <input type="radio" name="gender" id="dot-3" value="3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>

        <div class="button">
          <div class="submit-form" data-send="/app/user/store" data-form="storeField" style="text-align: center; padding-top: 8px">Register</div>
          Already have an account? Click <a href="/login">Login</a>
        </div>
      </form>
    </div>
  </div>
<script src="\js\jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js" integrity="sha512-eP6ippJojIKXKO8EPLtsUMS+/sAGHGo1UN/38swqZa1ypfcD4I0V/ac5G3VzaHfDaklFmQLEs51lhkkVaqg60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollTrigger.min.js" integrity="sha512-CPA5LMoJI/a5HkSIAKcBtFXe4gqGjPUL2ExF/3PmhrrHI17wod9xOqqF+0WZQRKIIq0KwF8oG5BaiWobtrke3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/submit-form-v2.js"></script>
  <script>
    gsap.registerPlugin(ScrollTrigger);
    var tl = gsap.timeline();

    tl.from ('.container',{
       y: '-50%',
       opacity: 0,
       duration: 2,
       ease: Power4.easeOut
    })
    </script>
</body>
</html>
