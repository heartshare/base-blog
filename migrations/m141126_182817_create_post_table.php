<?php

use yii\db\Schema;
use yii\db\Migration;

class m141126_182817_create_post_table extends Migration
{
    public function up()
    {
		$this->createTable('post', [
			'post_id' => Schema::TYPE_PK,
			'title' => Schema::TYPE_STRING . ' NOT NULL',
			'slug' => Schema::TYPE_STRING . ' NOT NULL',
			'description' => Schema::TYPE_TEXT . ' NOT NULL',
			'content' => Schema::TYPE_TEXT . ' NOT NULL',
			'status' => Schema::TYPE_SMALLINT . ' NOT NULL',
			'update_time' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
			'create_time' => Schema::TYPE_TIMESTAMP . ' NOT NULL',
			'UNIQUE INDEX `slug` (`slug`), INDEX `status` (`status`), INDEX `create_time` (`create_time`)'
		]);
    }

    public function down()
    {
        $this->dropTable('post');
    }
}
