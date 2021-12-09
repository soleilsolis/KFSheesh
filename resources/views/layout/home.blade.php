<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KF.Sheesh</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/errorfields.css" class="stylesheet">
</head>
<body>

    <div class="nav-container">
       <header>
           <a href="" class="logo">KF.Sheesh</a>

           <nav>
               <ul>
                    <li><a href="#members">About us</a></li>
                    <li><a href="#featured">Our Projects</a></li>
                    <li><a href="/login">Hire us</a></li>
               </ul>
           </nav>
       </header>
       <div class="social-header">
           <ul>
               <b>Join us</b><li><a href="https://discord.gg/UpJ9BQCpqw" target="_blank"><img src="images/discord.png" alt="discord"></a></li>
           </ul>
       </div>
   </div>

   @yield('content')

   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/gsap.min.js" integrity="sha512-eP6ippJojIKXKO8EPLtsUMS+/sAGHGo1UN/38swqZa1ypfcD4I0V/ac5G3VzaHfDaklFmQLEs51lhkkVaqg60Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.8.0/ScrollTrigger.min.js" integrity="sha512-CPA5LMoJI/a5HkSIAKcBtFXe4gqGjPUL2ExF/3PmhrrHI17wod9xOqqF+0WZQRKIIq0KwF8oG5BaiWobtrke3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

   <script>
       gsap.registerPlugin(ScrollTrigger);
       var tl = gsap.timeline();

       tl.from ('.content',{
           y: '-30%',
           opacity: 0,
           duration: 2,
           ease: Power4.easeout
       })
       tl.from('.stagger1', {
           opacity: 0,
           y: -50,
           stagger: .3,
           ease: Power4.easeout,
           duration: 2
       }, "-=1.5")
       tl.from('.hero-design',{
           opacity: 0, y: 50, ease:Power4.easeout, duration: 1
       }, "-=2")

       gsap.from(".tri-anim",  {
           stagger: .2,
           scale: 0.1,
           duration: 2,
           ease: Back.easeOut.config(1.7)

       })

       gsap.from(".transition2", {
           scrollTrigger: {
               trigger: '.transition2',
               start: "top bottom"
           },
           y: 50,
           opacity: 0,
           duration: 1.2,
           stagger: .3
       })

       gsap.from(".transition3", {
           scrollTrigger: {
               trigger: '.transition3',
               start: "top center"
           },
           y: 50,
           opacity: 0,
           duration: 1.2,
           stagger: .6
       });
   </script>

</body>

</html>
