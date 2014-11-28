<?php

use yii\db\Schema;
use yii\db\Migration;

class m141128_171930_comment_constraints extends Migration
{
    public function up()
    {
		$this->addForeignKey('comment_fk1', 'comment', 'post_id', 'post', 'post_id','cascade', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('comment_fk1', 'comment');
    }
}
