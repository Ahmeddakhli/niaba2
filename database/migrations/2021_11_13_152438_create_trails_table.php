<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trails', function (Blueprint $table) {
            $table->id();
            $table->biginteger('national_number');
            $table->Text('complainer_name');
            $table->string('phone_number');
            $table->string('filenames')->nullable();
            $table->Text('complained');// اسم الجهه المشو بها
            //$table->string('action')->nullable();
            $table->longText('procedure')->nullable();
            $table->longText('behave')->nullable();
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('trails');
    }
}
