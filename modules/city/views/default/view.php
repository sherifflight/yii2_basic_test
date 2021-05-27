<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

$this->title = 'City ID: ' . $city->id ?? 'null';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h1>Список отзывов города: <?= $city->name ?>.</h1>
    <div class="body-content">
        <div class="row">
            <?php if (isset($city->feedbacks) && (count($city->feedbacks) > 0)) :?>
                <?php foreach ($city->feedbacks as $feedback) : ?>
                    <div class="col-lg-4">
                        <h2><?= $feedback->title ?></h2>
                        <p><?= $feedback->text ?></p>
                    </div>
                <?php endforeach; ?>
            <? else: ?>
                <div class="col-lg-4">
                    <h4>У города нет отзывов.</h4>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
