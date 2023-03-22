<?php

namespace Database\Seeders\Badaso\CRUD;

use Illuminate\Database\Seeder;
use Uasoft\Badaso\Facades\Badaso;
use Uasoft\Badaso\Models\MenuItem;

class CategoriasCRUDDataTypeAdded extends Seeder
{
    /**
     * Auto generated seed file
     *
     * @return void
     *
     * @throws Exception
     */
    public function run()
    {
        \DB::beginTransaction();

        try {

            $data_type = Badaso::model('DataType')->where('name', 'categorias')->first();

            if ($data_type) {
                Badaso::model('DataType')->where('name', 'categorias')->delete();
            }

            \DB::table('badaso_data_types')->insert(array (
                'id' => 1,
                'name' => 'categorias',
                'slug' => 'categorias',
                'display_name_singular' => 'Categoria',
                'display_name_plural' => 'Categorias',
                'icon' => 'category',
                'model_name' => 'App\\Models\\Categoria',
                'policy_name' => NULL,
                'controller' => NULL,
                'order_column' => 'nome',
                'order_display_column' => 'nome',
                'order_direction' => 'ASC',
                'generate_permissions' => true,
                'server_side' => false,
                'is_maintenance' => 0,
                'description' => NULL,
                'details' => NULL,
                'notification' => '[]',
                'is_soft_delete' => false,
                'created_at' => '2023-03-14T17:35:32.000000Z',
                'updated_at' => '2023-03-14T18:01:20.000000Z',
            ));

            Badaso::model('Permission')->generateFor('categorias');

            $menu = Badaso::model('Menu')->where('key', config('badaso.default_menu'))->firstOrFail();

            $menu_item = Badaso::model('MenuItem')
                ->where('menu_id', $menu->id)
                ->where('url', '/general/categorias')
                ->first();

            $order = Badaso::model('MenuItem')->highestOrderMenuItem($menu->id);

            if (!is_null($menu_item)) {
                $menu_item->fill([
                    'title' => 'Categorias',
                    'target' => '_self',
                    'icon_class' => 'category',
                    'color' => null,
                    'parent_id' => null,
                    'permissions' => 'browse_categorias',
                    'order' => $order,
                ])->save();
            } else {
                $menu_item = new MenuItem();
                $menu_item->menu_id = $menu->id;
                $menu_item->url = '/general/categorias';
                $menu_item->title = 'Categorias';
                $menu_item->target = '_self';
                $menu_item->icon_class = 'category';
                $menu_item->color = null;
                $menu_item->parent_id = null;
                $menu_item->permissions = 'browse_categorias';
                $menu_item->order = $order;
                $menu_item->save();
            }

            \DB::commit();
        } catch(Exception $e) {
            \DB::rollBack();

           throw new Exception('Exception occur ' . $e);
        }
    }
}
