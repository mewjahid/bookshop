<?php

	namespace app\commands;

	use yii\console\Controller;
	use app\models\User;
	use Yii;

	class RbacController extends Controller
	{
		public function actionInit ()
		{
			$auth = Yii::$app->authManager;

			$auth->removeAll();

			$admin = $auth->createRole('admin');
			$user = $auth->createRole('user');

			// запишем их в БД
			$auth->add($admin);
			$auth->add($user);

			$viewAdminPage = $auth->createPermission('viewAdminPage');
			$viewAdminPage->description = 'Просмотр админки';

			$viewIndex = $auth->createPermission('viewindex');
			$viewIndex->description = 'Просмотр сайта';

			$auth->add($viewAdminPage);
			$auth->add($viewIndex);

			$auth->addChild($user, $viewIndex);

			$auth->addChild($admin, $user);

			$auth->addChild($admin, $viewAdminPage);

			$auth->assign($admin, 1);

			$auth->assign($user, 2);
		}
	}