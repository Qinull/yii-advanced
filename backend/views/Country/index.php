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
               'data-whatever' => 'hahaha',
               'class'=>'btn btn-success button-open-modal',
               //'data-id'=>$model->id,
               //'style' => 'margin-right:3px'
            ])            
        ?>         
    </p>
<?php Pjax::begin()?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Code',
            'Name',
            'Continent',
            'Region',
            'SurfaceArea',
            // 'IndepYear',
            // 'Population',
            // 'LifeExpectancy',
            // 'GNP',
            // 'GNPOld',
            // 'LocalName',
            // 'GovernmentForm',
            // 'HeadOfState',
            // 'Capital',
            // 'Code2',

            ['class' => 'yii\grid\ActionColumn'],
        ],      
    ]); ?>
<?php Pjax::end()?>
</div>

    <?php 
    echo Modal::widget([
        'header' => '<h4 class="modal-title">我的模态对话框</h4>',
        'id'=>'myModal',
    ]);

$this->registerJs(<<<JSCONTENT
    
    // 解决Select2的搜索框在Modal Dialog中不能输入的问题
    $.fn.modal.Constructor.prototype.enforceFocus =function(){};
       
    $('.button-open-modal').click(function() {
        alert($(this).data('whatever'));
        $('#myModal .modal-body').html('加载中');
        $('#myModal .modal-body').eq(0).load(this.href);
    });    
JSCONTENT
);
