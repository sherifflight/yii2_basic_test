<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Cities';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="body-content">
        <?php if (count($cities) > 0) :?>
            <div class="row">
                <?php foreach ($cities as $city) : ?>
                    <div class="col-lg-4">
                        <h2>
                            <a href="<?= Url::to(['/city/default/view', 'id' => $city->id]) ?>"><?= $city->name ?></a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.</p>
                    </div>
                <? endforeach; ?>
            </div>
        <?php else: ?>
        <div class="row">
            <div class="col-lg-4">
                <h4>Список городов пуст.</h4>
            </div>
        </div>

        <?php endif; ?>
    </div>
</div>
