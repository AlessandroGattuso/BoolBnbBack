<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apartments', function (Blueprint $table) {
			$table->id();
			$table->string('descrizione', 300);
			$table->string('slug', 320);
			$table->unsignedSmallInteger('numero_di_stanze')->default(1);
			$table->unsignedTinyInteger('numero_di_bagni')->default(1);
			$table->unsignedSmallInteger('metri_quadri');
			$table->string('cover')->nullable();
			$table->boolean('visible')->default(true);
			$table->decimal('prezzo', 12, 2);
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
		Schema::dropIfExists('apartments');
	}
};
