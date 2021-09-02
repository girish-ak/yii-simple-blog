<?php
/** @var $model \app\models\Article   */

use yii\helpers\Html;

?>
<div>
    <a href="<?php echo yii\helpers\Url::to(['/article/view','slug'=>$model->slug]) ?>" ><h2 class=" my-3 text-secondary "><?php echo \yii\helpers\Html::encode($model->title)?></h2></a>
    <div>
        <h6 class=""><?php echo yii\helpers\StringHelper::truncate($model->getEncodedBody(),40) ?></h6>
    </div>
    <p class="text-right">
    <small class="text-muted">Created : <b><?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?></b>
        By : <b><?php echo $model->createdBy->username ?></b>
    </small>
    </p>
    <?php if (!Yii::$app->user->isGuest): ?>

    <button id="toggle" onclick="this.innerText= this.innerText=='Like'?'Unlike':'Like'">Like</button>


    <?php endif; ?>
    <hr>
</div>