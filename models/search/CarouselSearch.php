<?php

namespace artsoft\carousel\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use artsoft\carousel\models\Carousel;

/**
 * CarouselSearch represents the model behind the search form about `artsoft\carousel\models\Carousel`.
 */
class CarouselSearch extends Carousel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'items', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'single_item', 'navigation', 'pagination', 'transition_style', 'auto_play', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Carousel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => Yii::$app->request->cookies->getValue('_grid_page_size', 20),
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'items' => $this->items,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'single_item', $this->single_item])
            ->andFilterWhere(['like', 'navigation', $this->navigation])
            ->andFilterWhere(['like', 'pagination', $this->pagination])
            ->andFilterWhere(['like', 'transition_style', $this->transition_style])
            ->andFilterWhere(['like', 'auto_play', $this->auto_play])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
