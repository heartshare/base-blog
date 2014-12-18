<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property integer $comment_id
 * @property integer $post_id
 * @property string $content
 * @property integer $status
 * @property string $author
 * @property string $email
 * @property string $url
 * @property string $create_time
 *
 * @property Post $post
 */
class Comment extends \yii\db\ActiveRecord
{
	/**
	 * Constants for status column
	 */
	const STATUS_PUBLISHED = 1;
	const STATUS_PENDING = 2;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'content', 'status', 'author', 'email'], 'required'],
            [['post_id', 'status'], 'integer'],
            [['content'], 'string'],
            [['create_time'], 'safe'],
            [['author', 'email', 'url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'comment_id' => 'Comment ID',
            'post_id' => 'Post ID',
            'content' => 'Content',
            'status' => 'Status',
            'author' => 'Author',
            'email' => 'Email',
            'url' => 'Url',
            'create_time' => 'Create Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['post_id' => 'post_id']);
    }
    
    /**
     * Approves comment. Changes status to published.
     * @return boolean
     */
    public function approve()
    {
		$this->status = self::STATUS_PUBLISHED;
		return $this->update();
	}
	
	/**
	 * Displays in brackets number of comments that are waiting approval.
	 * @return string $pending
	 */
	public static function pending()
	{
		$pendingComments = self::find()->where(['status' => self::STATUS_PENDING])->asArray()->all();
		$pending = count($pendingComments);
		if ($pending == 0) {
			return false;
		} else {
			return $pending = ' ('. $pending .')';
		}
	}
}
