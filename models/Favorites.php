<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "favorites".
 *
 * @property string $user
 * @property int $pub
 *
 * @property Publications $pub0
 * @property Users $user0
 */
class Favorites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'favorites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pub'], 'integer'],
            [['user'], 'string', 'max' => 50],
            [['pub'], 'exist', 'skipOnError' => true, 'targetClass' => Publications::className(), 'targetAttribute' => ['pub' => 'id']],
            [['user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user' => 'User',
            'pub' => 'Pub',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPub0()
    {
        return $this->hasOne(Publications::className(), ['id' => 'pub']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser0()
    {
        return $this->hasOne(Users::className(), ['id' => 'user']);
    }
}
