<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('accounts', function($table)   {
          $table->increments('idx'); // id INT AUTO_INCREMENT PRIMARY KEY
          $table->string('type', 1);
          $table->expense_type('type', 1); // title VARCHAR(100)
          $table->string('account_name', 100);
          $table->integer('amount', 20);
          $table->date('date');  // body TEXT
          $table->timestamps(); // created_at TIMESTAMP, updated_at TIMESTAMP
          $table->foreign('user_id')->references('id')->on('users');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('accounts');
    }
}
