<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $full_name
 * @property string $date_of_birth
 * @property string $date_of_death
 *
 * @property Books[] $books
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'date_of_birth'], 'required'],
            [['date_of_birth', 'date_of_death'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'date_of_birth' => 'Date Of Birth',
            'date_of_death' => 'Date Of Death',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['author_id' => 'id']);
    }
}
