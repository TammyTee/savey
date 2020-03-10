<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('budget_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('budget_categories', function(Blueprint $table) {
            $table->dropForeign('budget_categories_user_id_foreign');
            $table->dropIfExists('categories');
        });
    }
}
