<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Traits\Seedable;

class BadasoDeploymentOrchestratorSeeder extends Seeder
{
    use Seedable;

    protected $seedersPath = 'database/seeders/Badaso/CRUD/';

    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $this->seed(CategoriasCRUDDataTypeAdded::class);
        $this->seed(CategoriasCRUDDataRowAdded::class);
        
        
        $this->seed(Badaso_usersCRUDDataTypeAdded::class);
        $this->seed(Badaso_usersCRUDDataRowAdded::class);
        $this->seed(EventosCRUDDataDeleted::class);
        
        
        
        
        $this->seed(EventosCRUDDataTypeAdded::class);
        $this->seed(EventosCRUDDataRowAdded::class);
    }
}
