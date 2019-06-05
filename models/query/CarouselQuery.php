<?php

namespace artsoft\carousel\models\query;

/**
 * This is the ActiveQuery class for [[\artsoft\carousel\models\Carousel]].
 *
 * @see \artsoft\carousel\models\Carousel
 */
class CarouselQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \artsoft\carousel\models\Carousel[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \artsoft\carousel\models\Carousel|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
