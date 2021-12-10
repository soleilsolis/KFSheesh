<!doctype html>
<html class="no-js" lang="en">
<head>
 <meta charset="utf-8" />
 <meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="/css1/bootstrap.min.css">
    <link rel="stylesheet" href="/css1/font-awesome.min.css">
    <link rel="stylesheet" href="/style.css">
 
 <title>Your Result</title>
 
</head>
 
<body>
    <div class="all-content-wrapper">
     <div class="header-advance-area">
            <div class="header-top-area">
                 <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
     <div class="content-error">
                <div class="hpanel">
                    <div class="panel-body">
                         <div id="page-wrap">
 <br><br><br>
 <div>
 <h1><center>IT Personality Quiz Result</center></h1>
</div>
 <br><br><br><br>
 
        <?php
            $rating="You are a beginner IT";
            $answer1 = $_POST['question-1-answers'];
            $answer4 = $_POST['question-4-answers'];

            if ($answer1=="A" && $answer4=="B") {
                $rating="You can be a good IT";
            }
            else if ($answer1=="A" && $answer4=="C") {
                $rating="You can be a good IT";
            }
            elseif ($answer1=="A" && $answer4=="D") {
                $rating="You can be a great IT";
            }

            if ($answer1=="B" && $answer4=="B") {
                $rating="You are an Intermediate IT";
            }
            elseif ($answer1=="B" && $answer4=="A") {
                $rating="You can be a good IT";
            }
            elseif ($answer1=="B" && $answer4=="C") {
                $rating="You can be a great IT";
            }
            elseif ($answer1=="B" && $answer4=="D") {
                $rating="You can be a great IT";
            }
            if ($answer1=="C" && $answer4=="C") {
                $rating="You are a great IT";
            }
            elseif ($answer1=="C" && $answer4=="A") {
                $rating="You can be a good IT";
            }
            elseif ($answer1=="C" && $answer4=="B") {
                $rating="You can be a great IT";
            }
            elseif ($answer1=="C" && $answer4=="D") {
                $rating="You can be an Excellent IT";
            }
            if ($answer1=="D" && $answer4=="D") {
                $rating="You are an Excellent IT";
            }
            elseif ($answer1=="D" && $answer4=="A") {
                $rating="You can be a great IT";
            }
            elseif ($answer1=="D" && $answer4=="B") {
                $rating="You can be an great IT";
            }
            elseif ($answer1=="D" && $answer4=="C") {
                $rating="You can be an Excellent IT";
            }


        ?>
        <div>
        <h2><center>Your rating: <?php echo " $rating"; ?>, Keep up the good work!</center></h2>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
 <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>DESIGNED BY: CATINDIG | DELA CRUZ JE | FELICEN | RANTAEL | VILLAMIN </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
 
</html>