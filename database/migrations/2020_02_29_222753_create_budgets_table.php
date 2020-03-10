<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->unsignedBigInteger('budget_category_id')->nullable();
            $table->foreign('budget_category_id')
                ->references('id')->on('budget_categories');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('budgets', function (Blueprint $table) {
            $table->dropForeign('budgets_user_id_foreign');
            $table->dropForeign('budgets_budget_category_id_foreign');
            $table->dropIfExists('budgets');
        });
    }
}
