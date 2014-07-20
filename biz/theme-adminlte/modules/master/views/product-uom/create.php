<?php

/**
 * @var yii\web\View $this
 * @var biz\master\models\ProductUom $model
 */

$this->title = 'Create Product Uom';
$this->params['breadcrumbs'][] = ['label' => 'Product Uoms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-uom-create col-lg-8">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
