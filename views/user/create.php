<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UserModel $model */

$this->title = 'Create User Model';
$this->params['breadcrumbs'][] = ['label' => 'User Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
