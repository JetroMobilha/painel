<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventosTableFcyi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {

                Schema::table('eventos', function (Blueprint $table) {
            $table->enum('status', ['pendente','em progresso','concluido'])->default('pendente');
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


        Schema::table('eventos', function (Blueprint $table) {
            $table->dropColumn('status');
        });


    }
}
