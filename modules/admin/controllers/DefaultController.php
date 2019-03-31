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


		$books = Books::find()->with('author')->asArray()->all();

	    $authors = Authors::find()->select(['authors.id', 'authors.full_name', 'books' => 'count(*)'])
		    ->leftJoin('books', 'authors.id = books.author_id')
		    ->groupBy('authors.id')->asArray()->all();

	    

	    return $this->render('index', [
			'books' => $books, 
			'authors' => $authors,
	    ]);
    }
}
