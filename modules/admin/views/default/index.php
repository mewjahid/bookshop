<?php

	use yii\helpers\Html;
	use yii\grid\GridView;
?>
<div class="admin-default-index">
    <h1>Административная часть</h1>




	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'id',
			[
				'attribute' => 'author_id',
				'value' => 'author.full_name'
			],
			'title',
			'genre',


			// 'keywords',
			// 'description',
			// 'created',
			// 'status',

			['class' => 'yii\grid\ActionColumn'],
		],
	]); ?>




</div>
