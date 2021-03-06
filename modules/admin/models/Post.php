<?php

namespace app\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\helpers\Html;

/**
 * This is the model class for table "post".
 *
 * @property integer $post_id
 * @property string $title
 * @property string $slug
 * @property string $description
 * @property string $content
 * @property integer $status
 * @property string $update_time
 * @property string $create_time
 * @property integer $views
 *
 * @property Comment[] $comments
 * @property PostTag[] $postTags
 * @property Tag[] $tags
 */
class Post extends \yii\db\ActiveRecord
{
	/**
	 * Constants for status column 
	 */
	const STATUS_PUBLISHED = 1;
	const STATUS_ARCHIVED = 2;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }
    
    public function behaviors()
    {
		return [
			'timestamp' => [
				'class' => TimestampBehavior::className(),
				'createdAtAttribute' => 'create_time',
				'updatedAtAttribute' => 'update_time',
				'value' => new \yii\db\Expression('NOW()'),
            ],
            'sluggable' => [
				'class' => SluggableBehavior::className(),
				'attribute' => 'title',
				'slugAttribute' => 'slug',
            ],
		];
	}

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'description', 'content', 'status'], 'required'],
            [['description', 'content'], 'string'],
            [['status', 'views'], 'integer'],
            [['update_time', 'create_time'], 'safe'],
            [['title', 'slug'], 'string', 'max' => 255],
            [['slug'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'description' => 'Description',
            'content' => 'Content',
            'status' => 'Status',
            'update_time' => 'Update Time',
            'create_time' => 'Create Time',
            'views' => 'Views',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['post_id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this->hasMany(Tag::className(), ['tag_id' => 'tag_id'])->viaTable('post_tag', ['post_id' => 'post_id']);
    }
    
    /**
     * @return string Post create time
     */
    public function displayCreatedDate()
    {
		return Yii::$app->formatter->asDate($this->create_time, 'long');
	}
	
	/**
     * @return string Post update time
     */
    public function displayUpdatedDate()
    {
		return Yii::$app->formatter->asDate($this->update_time, 'long');
	}
	
	/**
	 * @return string Tags that post is tagged with
	 */
	public function displayTags()
	{
		$tags = '';
		foreach ($this->tags as $tag) {
			$tags .= $tag->name . ', ';
		}
		return rtrim($tags, ', ');
	}
	/**
     * @return integer Number of comments on post
     */
    public function getCommentCount()
    {
		return $this->getComments()->count();
	}
}
