<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel core\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('assets/jquery-ui-1.11.4/jquery-ui.min.css', ['depends' => 'backend\assets\AppAsset']);
$this->registerCssFile('assets/jqgrid/ui.jqgrid.css', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('assets/jquery-ui-1.11.4/jquery-ui.min.js', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('assets/jqgrid/grid.locale-cn.js', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('assets/jqgrid/jquery.jqGrid.min.js', ['depends' => 'backend\assets\AppAsset']);
$this->registerJsFile('js/country-index.js', ['depends' => 'backend\assets\AppAsset']);
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Pop up to create Country', 
            ['create-in-dialog', 'id' => '11'], 
            [
               'title' => 'Add new country',
               'data-toggle' => 'modal',
               'data-target' => '#myModal',
               'class'=>'btn btn-success button-open-modal',
               //'data-id'=>$model->id,
               //'style' => 'margin-right:3px'
            ])            
        ?>         
    </p>

    <table id="list_records"><tr><td></td></tr></table> 
    <div id="perpage"></div>
</div>

    <?php 
    echo Modal::widget([
        'header' => '<h4 class="modal-title">我的模态对话框</h4>',
        'id'=>'myModal',
    ]);

$this->registerJs(<<<JSCONTENT
        $('.button-open-modal').click(function() {
            $('#myModal .modal-body').html('加载中');
            $('#myModal .modal-body').eq(0).load(this.href);
        });    
JSCONTENT
);
