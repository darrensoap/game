<?php
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
AppAsset::register($this);
$this->title = 'Mini Game';
?>
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
  <p id="timer"></p>
  <?php if(empty($user)) :?>
  <div class="gamecontainer">
    <div class="scroll">
      <img id="scroll" src="<?php echo Yii::$app->params['imagepath'].'/scroll.PNG'?>"/>
    </div>
    <div class="lantern1">
      <img id="fNum" alt="lantern1" src="<?php echo Yii::$app->params['imagepath'].'/lantern1.PNG'?>" onclick="generateNumber(1)"/>
    </div>
    <div class="lantern2">
      <img id="sNum" alt="lantern2" src="<?php echo Yii::$app->params['imagepath'].'/lantern1.PNG'?>" onclick="generateNumber(2)"/>
    </div>
    <div class="lantern3">
      <img id="tNum" alt="lantern3" src="<?php echo Yii::$app->params['imagepath'].'/lantern1.PNG'?>" onclick="generateNumber(3)"/>
    </div>
      <div class="result1"><span id="result1"></span></div>
      <div class="result2"><span id="result2"></span></div>
      <div class="result3"><span id="result3"></span></div>
      <div id="finishNotice">
          <p>You have finshied your chance. Please wait the result come out.Thank You! </p>
      </div>
  </div>
  <?php else :?>
  <div class="gamecontainer">
    <div class="scroll">
      <img id="scroll" src="<?php echo Yii::$app->params['imagepath'].'/scroll.PNG'?>"/>
    </div>
        <div class="result1"><?php echo $user['fNum']?></div>
        <div class="result2"><?php echo $user['sNum']?></div>
        <div class="result3"><?php echo $user['tNum']?></div>
  </div>
  <?php endif ;?>
</body>
</html>
