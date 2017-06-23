<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = 'Reward';
?>
?>

<h1 class="rewardHeader">Reward Results</h1>
<p class="todayDate"><?php echo $date;?></p>

<div class="rewardtable">
    <table class="table table-hover">
	<?php if(empty($rewards)): ?>
                    <p align = "center" style="font-size: 30px; color: white;">No Data</p>
    <?php else : ?>
        <thead>
            <tr>
                <th>User ID</th>
                <th>
                    <span></span>Prize</th>
                <th>
                    <span></span>Prize amount</th>
                <th>
                    <span></span>Submit Time</th>
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
          <?php endif ?>

        </tbody>
    </table>
</div>
<div class="pagination pull-right">
    <?php echo yii\widgets\LinkPager::widget(['pagination' => $pager , 'prevPageLabel' => '&#8249' , 'nextPageLabel' => '&#8250']) ?>
</div>
