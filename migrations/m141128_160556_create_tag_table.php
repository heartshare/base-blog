<?php

use yii\db\Schema;
use yii\db\Migration;

class m141128_160556_create_tag_table extends Migration
{
    public function up()
    {
		$this->createTable('tag', [
			'tag_id' => Schema::TYPE_PK,
			'name' => Schema::TYPE_STRING . ' NOT NULL',
			'UNIQUE INDEX `name` (`name`)'
		]);
    }

    public function down()
    {
        $this->dropTable('tag');
    }
}
