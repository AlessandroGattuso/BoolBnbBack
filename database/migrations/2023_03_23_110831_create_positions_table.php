<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Position;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('indirizzo');
            $table->unsignedTinyInteger('N_civico');
            $table->double('Latitudine');
            $table->double('Longitudine');
            $table->string('città', 50);
            $table->string('Nazione',20);
            $table->unsignedBigInteger('apartment_id');
            $table->timestamps();

            $table->foreign('apartment_id')->references('id')->on('apartments')
 
        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
};
