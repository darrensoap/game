<?php
/* @var $this yii\web\View */
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>The HTML5 Herald</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">
<<<<<<< HEAD
  <script>
    function generateNumber(n){
      ans = Math.floor(Math.random() * (99 - 0) + 0);
      //document.write(Math.floor(Math.random() * (99 - 10) + 10));
      if (n==1) {
        document.getElementById("result1").innerHTML = ans
        var ans1;
        ans = ans1;
        return showNumber(ans1);
      }else if (n==2) {
        document.getElementById("result2").innerHTML = ans
      }else {
        document.getElementById("result3").innerHTML = ans
      }
    }

    function showNumber(n){
      console.log(n);
    }
  </script>
=======

>>>>>>> a22cbbfa1f45b30fcb18f387d40d0adbe9ecb405
</head>

<body>
  <button onclick="generateNumber(1)" type="button" value="Press Here">Press Here</button>
  <button onclick="generateNumber(2)" type="button" value="Press Here">Press Here</button>
  <button onclick="generateNumber(3)" type="button" value="Press Here">Press Here</button>
  <p id="result1"></p><p id="result2"></p><p id="result3"></p>
</body>
</html>
