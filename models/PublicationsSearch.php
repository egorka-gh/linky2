<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Publications;

/**
 * PublicationsSearch represents the model behind the search form of `app\models\Publications`.
 */
class PublicationsSearch extends Publications
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category','order'], 'integer'],
            [['user', 'name', 'description', 'image', 'url', 'post_date','sql'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public $order =0;
    public $sql ='';
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Publications::index();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditionsuser
        $query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category,
            'post_date' => $this->post_date,
        ]);

        $query->andFilterWhere(['like', 'user', $this->user])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'url', $this->url]);

        switch ($this->order) {
            case 0:
                //$caption="Recent";
                $query->orderby('post_date DESC');
                break;
            case 1:
                //$caption="Best";
                $query->orderby('favorites_cnt DESC');
                break;
            case 2:
                //$caption="Favorites";
                //$where =" WHERE EXISTS (SELECT 1 FROM favorites f1 WHERE f1.pub = p.id AND f1.user = '".$user."')";
                $user=Yii::$app->user->id;
                $subQuery = (new \yii\db\Query)
                    ->select([new \yii\db\Expression('1')])
                    ->from('favorites f1')
                    ->where("f1.pub = publications.id and f1.user = '".$user."'");
                $query->where(['exists', $subQuery])->orderby('post_date DESC');
                break;
            case 3:
                //$caption="My links";
                //$where =" WHERE p.user ='".$user."'";
                $query->andWhere("user = '".Yii::$app->user->id."'");
                $query->orderby('post_date DESC');
                break;
        }
        $this->sql = $query->createCommand()->sql;

        return $dataProvider;
    }
}
