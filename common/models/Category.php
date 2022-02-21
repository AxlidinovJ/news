<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $catagory_name
 * @property string $date
 *
 * @property News[] $news
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['catagory_name'], 'required'],
            [['date','catagory_name'], 'safe'],
            [['catagory_name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catagory_name' => 'Catagory Name',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::className(), ['category_id' => 'id']);
    }
}
