<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "tag".
 *
 * @property integer $tag_id
 * @property string $name
 *
 * @property PostTag[] $postTags
 * @property Post[] $posts
 */
class Tag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tag_id' => 'Tag ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['tag_id' => 'tag_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['post_id' => 'post_id'])->viaTable('post_tag', ['tag_id' => 'tag_id']);
    }
}
