<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $comment_id
 * @property int $parent_comment_id
 * @property string $comment
 * @property string $comment_sender_name
 * @property string $imge
 * @property string $date
 *
 * @property Users $commentSenderName
 * @property Comments $parentComment
 * @property Comments[] $comments
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_comment_id'], 'integer'],
            [['comment', 'comment_sender_name', 'imge', 'date'], 'required'],
            [['date'], 'safe'],
            [['comment'], 'string', 'max' => 200],
            [['comment_sender_name', 'imge'], 'string', 'max' => 50],
            [['comment_sender_name'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['comment_sender_name' => 'id']],
            [['parent_comment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Comments::className(), 'targetAttribute' => ['parent_comment_id' => 'comment_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'parent_comment_id' => 'Parent Comment ID',
            'comment' => 'Comment',
            'comment_sender_name' => 'Comment Sender Name',
            'imge' => 'Imge',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommentSenderName()
    {
        return $this->hasOne(Users::className(), ['id' => 'comment_sender_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParentComment()
    {
        return $this->hasOne(Comments::className(), ['comment_id' => 'parent_comment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['parent_comment_id' => 'comment_id']);
    }
}
