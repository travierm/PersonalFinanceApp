<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_configs', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->float('current_account_balance', 8, 2)->default(0.00);
            $table->timestamp('current_account_balance_updated_at')->nullable();
            $table->json('json_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_configs', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->drop('user_configs');
        });
    }
}
