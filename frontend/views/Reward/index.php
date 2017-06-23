<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<h1>reward/index</h1>

<?php ActiveForm::begin(); ?>
<?php echo Html::submitButton('安全登录',["class" => "le-button huge"]); ?>
<?php ActiveForm::end() ;?>

<div class="row-fluid table">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="span2">User ID</th>
                <th class="span2">
                    <span class="line"></span>Prize</th>
                <th class="span2">
                    <span class="line"></span>Prize amount</th>
                <th class="span2">
                    <span class="line"></span>Prize amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rewards as $reward): ?>
            <tr>
                <td><?php echo $reward->userid; ?></td>
                <td><?php echo $reward->rewardStatus; ?></td>
                <td><?php echo $reward->price; ?></td>
                <td><?php echo date('Y-m-d H:i:s' , $reward->rewardTime); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="pagination pull-right">
    <?php echo yii\widgets\LinkPager::widget(['pagination' => $pager , 'prevPageLabel' => '&#8249' , 'nextPageLabel' => '&#8250']) ?>
</div>
