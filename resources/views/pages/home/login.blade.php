<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login to KF.Sheesh</title>
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">
            Login
         </div>
         <form id="loginField">

            @csrf
            <div class="field">
               <input name="email" type="text" required>
               <label>Email Address</label>
            </div>
            <div class="field">
               <input name="password" type="password" required>
               <label>Password</label>
            </div>
            <div class="field">
               <div class="submit-form" data-send="/app/user/login" data-form="loginField" style="text-align: center; padding-top: 8px">Sign Up</div>
            </div>
            <div class="signup-link">
               Not a member? <a href="registration.html">Sign up now</a> for free!
            </div>
         </form>
      </div>

      <footer>
          <div class="footer stagger1">
          <a href="index.html" class="href">⬅ KF.Sheesh | 2021</a>
          </div>
      </footer>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js" integrity="sha512-eP6ippJojIKXKO8EPLtsUMS+/sAGHGo1UN/38swqZa1ypfcD4I0V/ac5G3VzaHfDaklFmQLEs51lhkkVaqg60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollTrigger.min.js" integrity="sha512-CPA5LMoJI/a5HkSIAKcBtFXe4gqGjPUL2ExF/3PmhrrHI17wod9xOqqF+0WZQRKIIq0KwF8oG5BaiWobtrke3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/submit-form-v2.js"></script>
   <script>
        gsap.registerPlugin(ScrollTrigger);
        var tl = gsap.timeline();

        tl.from ('.wrapper',{
           y: '-50%',
           opacity: 0,
           duration: 2,
           ease: Back.easeOut.config(1.7)
        })

        tl.from('.stagger1', {
           opacity: 0,
           y: -50,
           stagger: .3,
           ease: Power4.easeout,
           duration: 2
       }, "-=1.5")
   </script>
   </body>
</html>
