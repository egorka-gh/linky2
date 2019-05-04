<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "publications".
 *
 * @property int $id
 * @property int $category
 * @property string $user
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $url
 * @property string $post_date
 *
 * @property Favorites[] $favorites
 * @property Categories $category0
 */
class Publications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publications';
    }

    public static function covers()
    {
        $rows = array();
        $files = array_slice(scandir('../web/img/covers/'), 2);
        $pattern = '/\w+(\.jpg)$/ui';
        for ($i = 0; $i < count($files); $i++) {
            if(preg_match($pattern, $files[$i]) == 1 ){
                $rows[]=$files[$i]; 
            }
        }
        return $rows;
    }

    public $favorites_cnt = 0;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category', 'user', 'name', 'description', 'image', 'url', 'post_date'], 'required'],
            [['category'], 'integer'],
            [['post_date'], 'safe'],
            [['user', 'description', 'image'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 30],
            [['url'], 'string', 'max' => 255],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'user' => 'User',
            'name' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'url' => 'Url',
            'post_date' => 'Post Date',
        ];
    }

    public function index()
    {
        return $this->find()
        ->select([
            'publications.*',
            'favorites_cnt' => Favorites::find()
                            ->select(['COUNT(*)'])
                            ->where('favorites.pub = publications.id'),
                ])
        ->with('categoryobj');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Favorites::className(), ['pub' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryobj()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category']);
    }
}
