<?php

namespace artsoft\carousel\models;

use Yii;
use artsoft\models\OwnerAccess;
use artsoft\models\User;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use artsoft\behaviors\SluggableBehavior;     
use artsoft\db\ActiveRecord;

/**
 * This is the model class for table "{{%carousel}}".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $items
 * @property int $single_item
 * @property int $navigation
 * @property int $pagination
 * @property string $transition_style
 * @property string $auto_play
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Carousel extends ActiveRecord implements OwnerAccess 
{
      
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%carousel}}';
    }

     /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'in_attribute' => 'name',
                'out_attribute' => 'slug',
                'translit' => true           
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['items', 'single_item', 'navigation', 'pagination', 'transition_style', 'auto_play', 'name'], 'required'],
            ['slug', 'required', 'enableClientValidation' => false],
            [['items', 'single_item', 'navigation', 'pagination', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'slug', 'transition_style', 'auto_play'], 'string', 'max' => 127],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'slug'], 'safe'],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
   public function attributeLabels()
    {
        return [
            'id' => Yii::t('art', 'ID'),
            'name' => Yii::t('art', 'Name'),
            'slug' => Yii::t('art', 'Slug'),
            'items' => Yii::t('art/carousel', 'Items Qty'),
            'single_item' => Yii::t('art/carousel', 'Single Item'),
            'navigation' => Yii::t('art/carousel', 'Navigation'),
            'pagination' => Yii::t('art/carousel', 'Pagination'),
            'transition_style' => Yii::t('art/carousel', 'Transition Style'),
            'auto_play' => Yii::t('art/carousel', 'Auto Play'),
            'status' => Yii::t('art', 'Status'),
            'created_at' => Yii::t('art', 'Created'),
            'updated_at' => Yii::t('art', 'Updated'),
            'created_by' => Yii::t('art', 'Created By'),
            'updated_by' => Yii::t('art', 'Updated By'),
        ];
    }

     
     public function getCreatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedDate()
    {
        return Yii::$app->formatter->asDate(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getCreatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->created_at);
    }

    public function getUpdatedTime()
    {
        return Yii::$app->formatter->asTime(($this->isNewRecord) ? time() : $this->updated_at);
    }

    public function getCreatedDatetime()
    {
        return "{$this->createdDate} {$this->createdTime}";
    }

    public function getUpdatedDatetime()
    {
        return "{$this->updatedDate} {$this->updatedTime}";
    }
    
     public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
    
     /**
     * getStatusList
     * @return array
     */
    public static function getStatusList()
    {
        return array(
            self::STATUS_ACTIVE => Yii::t('art', 'Active'),
            self::STATUS_INACTIVE => Yii::t('art', 'Inactive'),
        );
    }
    
    /**
     * {@inheritdoc}
     * @return \artsoft\carousel\models\query\CarouselQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \artsoft\carousel\models\query\CarouselQuery(get_called_class());
    }
    
    /**
     *
     * @inheritdoc
     */
    public static function getFullAccessPermission()
    {
        return 'fullCarouselAccess';
    }
    /**
     *
     * @inheritdoc
     */
    public static function getOwnerField()
    {
        return 'created_by';
    }
    
     /**
     * @return \yii\db\ActiveQuery
     */
    public static function getMediaInfo($id)
    {
       //$model_name = $class::getTableSchema()->fullName;
        return self::find()                 
                ->where(['id' => $id])
                ->select(['name AS name', "CONCAT('carousel/update/',id) AS url"])
                ->asArray()
                ->one();    
    }
}
