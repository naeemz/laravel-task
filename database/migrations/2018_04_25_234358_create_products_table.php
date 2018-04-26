<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('content');
            // payment done 1 else 0
            $table->tinyInteger('payment')->default(0);
            // record active/delete 0 else 1
            $table->tinyInteger('is_active')->default(1);
            // client/user id and ip address
            $table->unsignedInteger('user_id');
            $table->string('ip_address', 50)->nullable( true );
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
        Schema::dropIfExists('products');
    }
}
