<?php

use yii\db\Schema;
use yii\db\Migration;

class m141128_161619_create_post_tag_table extends Migration
{
    public function up()
    {
		$this->createTable('post_tag', [
			'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'tag_id' => Schema::TYPE_INTEGER . ' NOT NULL',
			'PRIMARY KEY (`post_id`,`tag_id`)'
		]);
    }

    public function down()
    {
        $this->dropTable('post_tag');
    }
}
