<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Player;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchPlayer */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Players');
$this->params['breadcrumbs'][] = $this->title;
$pagerConfig = require_once __DIR__. '/../../config/pager.php'

?>
<div class="player-index">
    <div class="row">
        <div class="col-lg-8">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="col-lg-4 text-right">
            <?= Html::a(Yii::t('app', 'Create Player'), ['create'], ['class' => 'btn btn-outline-success']) ?>
        </div>
    </div>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'pager' => $pagerConfig,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'contentOptions' => ['class' => 'row-number'],
            ],
            'name',
            [
                'contentOptions' => ['class' => 'text-right'],
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Player $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return '';
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<i class="fa-solid fa-pen"></i>', $url, ['class' => 'btn btn-sm btn-warning']);
                    },
                    'delete' => function ($url, $model, $key) {
                        return render_confirm($url, $model->id);
                    },
                ]
            ],
        ],
    ]); ?>

</div>
