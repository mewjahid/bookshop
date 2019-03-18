<?php

	namespace app\models;

	use yii\base\Model;
	use yii\base\InvalidParamException;

	/**
	 * Password reset form
	 */
	class ResetPasswordForm extends Model
	{

		public $password;

		/**
		 * @var \app\models\User
		 */
		private $_user;

		/**
		 * Creates a form model given a token.
		 *
		 * @param string $token
		 * @param array $config name-value pairs that will be used to initialize the object properties
		 * @throws \yii\base\InvalidParamException if token is empty or not valid
		 */
		public function __construct($token, $config = [])
		{

			if (empty($token) || !is_string($token)) {
				throw new InvalidParamException('Password reset token cannot be blank.');
			}

			$this->_user = User::findByPasswordResetToken($token);

			if (!$this->_user) {
				throw new InvalidParamException('Wrong password reset token.');
			}

			parent::__construct($config);
		}

		/**
		 * @inheritdoc
		 */
		public function rules()
		{
			return [
				['password', 'required'],
				['password', 'string', 'min' => 6],
			];
		}

		/**
		 * Resets password.
		 *
		 * @return bool if password was reset.
		 */
		public function resetPassword()
		{
			$user = $this->_user;
			$user->setPassword($this->password);
			$user->removePasswordResetToken();
			return $user->save(false);
		}

		public function actionRequestPasswordReset()
		{
			$model = new PasswordResetRequestForm();

			if ($model->load(Yii::$app->request->post()) && $model->validate()) {
				if ($model->sendEmail()) {
					Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
					return $this->goHome();
				} else {
					Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
				}
			}

			return $this->render('requestPasswordResetToken', [
				'model' => $model,
			]);
		}

		/**
		 * Resets password.
		 *
		 * @param string $token
		 * @return mixed
		 * @throws BadRequestHttpException
		 */
		public function actionResetPassword($token)
		{
			try {
				$model = new ResetPasswordForm($token);
			} catch (InvalidParamException $e) {
				throw new BadRequestHttpException($e->getMessage());
			}

			if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
				Yii::$app->session->setFlash('success', 'New password was saved.');
				return $this->goHome();
			}

			return $this->render('resetPassword', [
				'model' => $model,]);
      }

	}