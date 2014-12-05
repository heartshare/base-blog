<?php

use yii\db\Schema;
use yii\db\Migration;

class m141205_142845_add_views_column extends Migration
{
    public function up()
    {
		$this->addColumn('post', 'views', Schema::TYPE_INTEGER . ' NOT NULL DEFAULT 0');
    }

    public function down()
    {
        $this->dropColumn('post', 'views');
    }
}
