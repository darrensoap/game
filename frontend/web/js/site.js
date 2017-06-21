//defaullt three value to be empty
var first;
var second;
var third;

/**
    get generate number at each button click
    pass ans value to each specefic value
**/
function generateNumber(n){
    ans = Math.floor(Math.random() * (99 - 0) + 0);
    //document.write(Math.floor(Math.random() * (99 - 10) + 10));
    if (n==1) {
      if(ans.toString().length < 2){
          ans= "0"+ans;
        }
        document.getElementById("result1").innerHTML = ans;
        document.getElementById("fNum").disabled = true;
        first= ans;
        sendNumber();
    }else if (n==2) {
      if(ans.toString().length < 2){
          ans= "0"+ans;
        }
        document.getElementById("result2").innerHTML = ans;
        document.getElementById("sNum").disabled = true;
        second = ans;
        sendNumber();
    }else {
      if(ans.toString().length < 2){
          ans= "0"+ans;
        }
        document.getElementById("result3").innerHTML = ans;
        document.getElementById("tNum").disabled = true;
        third = ans;
        sendNumber();
    }
}

/**
    validate whether the all there value is empty or not
    if get all three value, pass the data to controller
 **/

function sendNumber()
{
    console.log(first);
    console.log(second);
    console.log(third);
    if(first && second && third)
    {
        $.ajax({
        url: "index.php?r=usernumber/index",
        type: "post",
        data : {
            fnum : first,
            snum : second,
            tnum : third,
            _csrf: '<?=Yii::$app->request->getCsrfToken()?>',
        },
        success: function (data) {
          console.log(data.search);
       },
       error: function (request, status, error) {
        alert(request.responseText);
        }
    });
    }
}

$(document).ready(function(){
  $("#fNum").click(function(){
    $("#fNum").fadeOut();
  });
  $("#sNum").click(function(){
    $("#sNum").fadeOut();
  });
  $("#tNum").click(function(){
    $("#tNum").fadeOut();
  });
  $("#fNum").hover(function(){
    $(this).css("opacity", "0.5");
    }, function(){
    $(this).css("opacity", "1");
  });
  $("#sNum").hover(function(){
    $(this).css("opacity", "0.5");
    }, function(){
    $(this).css("opacity", "1");
  });
  $("#tNum").hover(function(){
    $(this).css("opacity", "0.5");
    }, function(){
    $(this).css("opacity", "1");
  });
});
