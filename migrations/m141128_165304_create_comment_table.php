<?php

use yii\db\Schema;
use yii\db\Migration;

class m141128_165304_create_comment_table extends Migration
{
    public function up()
    {
		$this->createTable('comment', [
			'comment_id' => Schema::TYPE_PK,
			'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'content' => Schema::TYPE_TEXT . ' NOT NULL',
			'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
			'author' => Schema::TYPE_STRING . ' NOT NULL',
			'email' => Schema::TYPE_STRING . ' NOT NULL',
			'url' => Schema::TYPE_STRING,
			'create_time' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
			'INDEX `status` (`status`), INDEX `create_time` (`create_time`)'
		]);
    }

    public function down()
    {
        $this->dropTable('comment');
    }
}
