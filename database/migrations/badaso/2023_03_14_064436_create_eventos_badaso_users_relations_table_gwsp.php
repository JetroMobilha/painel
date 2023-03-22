<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosbadasousersrelationsTableGwsp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                Schema::create('eventos_badaso_users_relations', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->autoIncrement();
			$table->bigInteger('eventos_id')->unsigned();
			$table->bigInteger('badaso_users_id')->unsigned();
			$table->timestamps();
        });

        Schema::table('eventos_badaso_users_relations', function (Blueprint $table) {
            $table->foreign('eventos_id')->references('id')->on('eventos')->onDelete('cascade')->onUpdate('restrict');
			$table->foreign('badaso_users_id')->references('id')->on('badaso_users')->onDelete('cascade')->onUpdate('restrict');
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
        Schema::dropIfExists('eventos_badaso_users_relations');
    }
}
