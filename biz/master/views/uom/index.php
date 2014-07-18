<?php

use yii\helpers\Html;
use yii\grid\GridView;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var biz\master\models\UomSearch $searchModel
 */

$this->title = 'Uoms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uom-index">

	<h1><?= Html::encode($this->title) ?></h1>

	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<div class="pull-right">
        <?= Html::a('', ['create'], ['class' => 'btn btn-default glyphicon glyphicon-plus', 'title' => 'Create New', 'style' => 'width:100%;']) ?>
    </div>

	<?php echo GridView::widget([
		'dataProvider' => $dataProvider,
		'tableOptions' => ['class' => 'table table-striped'],
        'layout' => '{items}{pager}',
        //'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id_uom',
			'cd_uom',
			'nm_uom',
			'create_at',
			'create_by',
			// 'update_at',
			// 'update_by',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>

</div>
