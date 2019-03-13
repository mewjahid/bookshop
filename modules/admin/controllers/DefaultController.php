<?php

namespace app\modules\admin\controllers;

use app\models\Authors;
use SebastianBergmann\Comparator\Book;
use Yii;
use yii\web\Controller;
use app\models\Books;
use app\models\BooksSearch;
use yii\data\ActiveDataProvider;
/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
	    $searchModel = new BooksSearch();
	    $dataProvider = new ActiveDataProvider([
		    'query' => Books::find(),
		    'pagination' => [
			    'pageSize' => 20,
		    ],
	    ]);

		$books = Books::find()->asArray()->all();
	    return $this->render('index', [
			'dataProvider' => $dataProvider ,
		    'searchModel' => $searchModel,
	    ]);
    }
}
