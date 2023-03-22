<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropEventosbadasousersrelationsTableDwie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                Schema::dropIfExists('eventos_badaso_users_relations');

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
        Schema::create('eventos_badaso_users_relations', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
			$table->bigInteger('eventos_id')->index('eventos_id');
			$table->bigInteger('badaso_users_id')->index('badaso_users_id');
			$table->timestamps();
        });
    }
}
