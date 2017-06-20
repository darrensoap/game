<?php
use frontend\assets\AppAsset;
AppAsset::register($this);
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

</head>

<body>
  <div class="button">
    <button id="fNum" onclick="generateNumber(1)" type="button" value="Press Here">Press Here</button>
    <button id="sNum" onclick="generateNumber(2)" type="button" value="Press Here">Press Here</button>
    <button id="tNum" onclick="generateNumber(3)" type="button" value="Press Here">Press Here</button>
  </div>
  <div class="results">
    <span id="result1">empty</span><span id="result2">empty</span><span id="result3">empty</span>
  </div>
</body>
</html>
