<?php

namespace app\models;

use Yii;
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['post_id' => 'post_id'])->where(['status' => Comment::STATUS_PUBLISHED]);
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
     * Returns number of comments on post.
     * @return integer 
     */
    public function getCommentCount()
    {
		return $this->getComments()->count();
	}
    
    /**
     * Adds a comment to the database.
     * @return boolean
     */
    public function addComment($comment)
    {
		$comment->post_id = $this->post_id;
		if (Yii::$app->params['commentNeedApproval']) {
			$comment->status = Comment::STATUS_PENDING;
		} else {
			$comment->status = Comment::STATUS_PUBLISHED;
		}
		
		return $comment->save();
	}
    
    /**
     * Returns post create time.
     * @return string 
     */
    public function displayDate()
    {
		return Yii::$app->formatter->asDate($this->create_time, 'long');
	}
	
	/**
	 * Returns tags that post is tagged with (as links).
	 * @return string 
	 */
	public function displayTags()
	{
		$tags = '';
		foreach ($this->tags as $tag) {
			$tags .= Html::a($tag->name, ['post/tag', 'name' => $tag->name]) . ', ';
		}
		return rtrim($tags, ', ');
	}
	
	/**
	 * Returns link to comment section of post.
	 * @return string 
	 */
	public function displayCommentsLink() 
	{
		$commentCount = $this->getCommentCount();
		
		switch($commentCount) {
			case 0:
				return Html::a('Leave a comment', ['post/view', 'id' => $this->post_id, 'slug' => $this->slug, '#' => 'comment-form']);
				break;
			case 1:
				return Html::a('1 comment', ['post/view', 'id' => $this->post_id, 'slug' => $this->slug, '#' => 'comments']);
				break;
			default:
				return Html::a($commentCount . ' comments', ['post/view', 'id' => $this->post_id, 'slug' => $this->slug, '#' => 'comments']);
				break;
		}
	}
}
