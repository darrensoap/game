<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<h1>reward/index</h1>

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
                    <span class="line"></span>Submit Time</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rewards as $reward): ?>
            <tr>
                <td><?php echo $reward->username; ?></td>
                <td><?php echo $reward->rewardStatus; ?></td>
                <td><?php echo $reward->price; ?></td>
                <td><?php echo $reward->rewardTime; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="pagination pull-right">
    <?php echo yii\widgets\LinkPager::widget(['pagination' => $pager , 'prevPageLabel' => '&#8249' , 'nextPageLabel' => '&#8250']) ?>
</div>
