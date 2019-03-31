<?php

	namespace app\controllers\api\v1;

	use yii\db\Query;
	use yii\rest\ActiveController;

	class BookController extends ActiveController
	{
		public $modelClass = 'app\models\Books';


//
		public function actionList()
		{

			$query = (new \yii\db\Query())
				->select(['full_name', 'title'])
				->from('books')
				->join('INNER JOIN', 'authors', 'books.author_id = authors.id')
				->all();


			return $query;

		}

	}