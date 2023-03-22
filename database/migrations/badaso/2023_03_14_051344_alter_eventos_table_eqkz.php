<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventosTableEqkz extends Migration
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
            $table->enum('status', ['pendente','em progresso','concluido'])->nullable(true)->charset('')->collation('')->change();
			$table->enum('status', ['pendente','em progresso','concluido'])->default('pendente')->charset('')->collation('')->change();
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
            $table->enum('status', ['pendente','em progresso','concluido'])->nullable(false)->charset('')->collation('')->change();
			DB::statement('ALTER TABLE eventos ALTER COLUMN status DROP DEFAULT');
        });
    }
}
