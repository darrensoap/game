
function generateNumber(n){
    ans = Math.floor(Math.random() * (99 - 0) + 0);
    //document.write(Math.floor(Math.random() * (99 - 10) + 10));
    if (n==1) {
    document.getElementById("result1").innerHTML = ans;
    //ans = ans1;
    //return ans1;
    }else if (n==2) {
        document.getElementById("result2").innerHTML = ans;
    }else {
        document.getElementById("result3").innerHTML = ans;
    }
    $.ajax({
         url: "index.php?r=usernumber/index",
        type: "post",
        data : {
            value : ans,
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

