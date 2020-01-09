<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {

            // カラム削除
            $table->dropColumn('name');

            // カラム追加
            $table->bigInteger('folder_id')->unsigned()->after('id');
            $table->string('title', 100)->after('folder_id');
            $table->date('due_date')->after('title');
            $table->integer('status')->default(1)->after('due_date');

            // 外部キーを設定する
            $table->foreign('folder_id')->references('id')->on('folders');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
