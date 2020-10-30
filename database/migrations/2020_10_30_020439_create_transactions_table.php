<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_transaction_sources', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('name');

            $table->timestamps();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('source_id')
                ->constrained('user_transaction_sources');

            $table->text('description')->nullable();
            $table->float('amount');
            $table->timestamp('date')->useCurrent();
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
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['source_id']);
            $table->drop('transactions');
        });

        Schema::table('user_transaction_sources', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->drop('user_transaction_sources');
        });
    }
}
