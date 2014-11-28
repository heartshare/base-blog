<?php

use yii\db\Schema;
use yii\db\Migration;

class m141128_163326_post_tag_constraints extends Migration
{
    public function safeUp()
    {
		$this->addForeignKey('post_tag_fk1', 'post_tag', 'post_id', 'post', 'post_id','cascade', 'cascade');
		$this->addForeignKey('post_tag_fk2', 'post_tag', 'tag_id', 'tag', 'tag_id','cascade', 'cascade');
    }

    public function safeDown()
    {
        $this->dropForeignKey('post_tag_fk1', 'post_tag');
        $this->dropForeignKey('post_tag_fk2', 'post_tag');
    }
}
