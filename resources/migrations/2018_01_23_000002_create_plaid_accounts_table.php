<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaidAccountsTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('plaid_accounts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('item_id');
            $table->string('account');
            $table->string('account_id');
            $table->string('name');
            $table->string('official_name');
            $table->string('mask');
            $table->string('type');
            $table->string('subtype');
            $table->string('routing');
            $table->string('wire_routing')->nullable();
            $table->decimal('current', '10', '2');
            $table->decimal('available', '10', '2')->nullable();
            $table->decimal('limit', '10', '2')->nullable();
            $table->string('iso_currency_code')->nullable();

            $table->foreign('item_id')->references('id')
                ->on('plaid_items')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('plaid_accounts');
    }
}
