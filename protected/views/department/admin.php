<?php
/* @var $this DepartmentController */
/* @var $model Department */

$this->breadcrumbs = array(
    'Departments' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'Danh sách khoa', 'url' => array('index')),
    array('label' => 'Tạo khoa', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#department-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Quản lý khoa</h1>
<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'department-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'departmentCode',
        'departmentName',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
