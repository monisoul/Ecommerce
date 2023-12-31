<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->nullable();;
            $table->string('email')->unique();
            $table->string('photo',100)->nullable();
            $table->string('password',100);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();         
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
        
    }
}
