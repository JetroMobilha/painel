<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTableTnlc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                Schema::create('eventos', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->string('nome', 255);
			$table->text('descricao')->nullable(true);
			$table->dateTime('data_inicio');
			$table->dateTime('data_fim')->nullable(true);
			$table->string('localizacao', 255)->nullable(true);
			$table->bigInteger('categoria_id')->unsigned();
			$table->timestamps();
        });

        Schema::table('eventos', function (Blueprint $table) {
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('no action')->onUpdate('no action');
        });

        } catch (PDOException $ex) {
            $this->down();
            throw $ex;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
