<?php

namespace App\Widgets;

use Uasoft\Badaso\Interfaces\WidgetInterface;

use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use ReflectionClass;

use Uasoft\Badaso\Facades\Badaso;

use Uasoft\Badaso\Helpers\GetData;


class CalendarioWidget implements WidgetInterface
{
    /**
     * Set permission for widget
     * set null to allow all role
     * multiple permission allowed, separate by comma.
     */
    public function getPermissions()
    {
        return 'browse_users';
    }

    public function getType(): string
    {
        return  WidgetInterface::CALENDARIO;
    }

    public function getTabela(): string
    {
        return "eventos";
    }

    public function getModel($model)
    {
           //if (Auth::user()->hasRole('gestor') || Auth::user()->hasRole('admin')) {
            if (false) {
                return $model->select('*');
    
            } else {
                 
               return $model->whereIn('id',function($query){
                    $query->select('eventos_id')->from('user_eventos')->where('badaso_users_id', auth()->id());
                })->orwhere('autor',Auth::id());
    
               // return $query->select('tarefas.*')->distinct()
               //         ->join('tarefa_user', 'tarefa_user.tarefa_id', '=', 'tarefas.id')
               //         ->where(function($q){ $q->where('tarefa_user.user_id', Auth::id())->orwhere('autor',Auth::id());});
            }
        return $model;
    }

    public function getNome():string{
        return "eventos";
    }

    public function getNomeDisplay():string{
        return WidgetInterface::NOME;;
    }

    public function getLimit(){return 0;}

    public function getPage(){return 1;}

    public function getOrderField(){return '';}

    public function getOrderDirection(){return '';}

    public function run($params = null)
    {
        return [
            'type' => $this->getType(),
            'nome' => $this->getNome(),
            'label' => $this->getNomeDisplay(),
            'table' => $this->getTabela(),
            'icon' => 'person',
        ];
    }

    public function getDados() 
    {
        // get data type by slug
        $data_type = Badaso::model('DataType')::where('slug', $this->getTabela())->first();
        $data_type->data_rows = $data_type->dataRows;

        $builder_params = [
            'limit'           => $this->getLimit()> 0 ? $this->getLimit() :4,
            'page'            => $this->getPage()> 1 ? $this->getPage() : 1,
            'order_field'     => empty($this->getOrderField()) ? $this->getOrderField() : $data_type->order_column,
            'order_direction' => empty($this->getOrderDirection()) ? $this->getOrderDirection() : $data_type->order_direction,
            'filter_key'      =>  null,
            'filter_operator' => 'containts',
            'filter_value'    => '',
        ];

        $data_rows = collect($data_type->dataRows);
        $fields = collect($data_type->dataRows)->where('browse', 1)->pluck('field')->all();
        $ids = collect($data_type->dataRows)->where('field', 'id')->pluck('field')->all();
        $field_manytomany = [];

        foreach ($data_rows as $key => $data_row) {
            if (isset($data_row['relation']) && $data_row['relation']['relation_type'] == 'belongs_to_many') {
                $field_manytomany[] = $data_row['field'];
            }
        }

        $fields = array_diff(array_merge($fields, $ids), $field_manytomany);

        $ClassNome = $data_type->model_name;
        $model = new  $ClassNome();
        $order_field = $builder_params['order_field'];
        $order_direction = $builder_params['order_direction'];

        $records = [];

        if ($order_field) {
            $data = $model::query()->select($fields)->orderBy($order_field, $order_direction);
        } else {
            $data = $model::query()->select($fields);
        }
        // soft delete implement
        $is_soft_delete = $data_type->is_soft_delete;

        if ($is_soft_delete) {
            $data = $data->whereNotNull('deleted_at');
        }
        // end

        $data = $this->getModel($data);
        $data = $data->get();

        foreach ($data as $row) {
            $class = new ReflectionClass(get_class($row));
            $class_methods = $class->getMethods();

            $record = $row;
            foreach ($class_methods as $class_method) {
                if ($class_method->class == $class->name) {
                    try {
                        $record->{$class_method->name} = json_decode(json_encode($row->{$class_method->name}));
                    } catch (Exception $e) {
                        // $record->{$class_method->name} = json_decode(json_encode($row->{$class_method->name}()));
                    }
                }
            }
            $records[] = GetData::getRelationData($data_type, $record);
        }

        // add field data form table polymoriphims
        $records = collect($records)->map(function ($record) use ($data_rows) {
            foreach ($data_rows as $index => $data_row) {
                if (isset($data_row->relation) && $data_row->relation['relation_type'] == 'belongs_to_many') {
                    $table_manytomany = $data_row['field'];
                    $data_relation = DB::table($table_manytomany)
                        ->get();
                    $record->$table_manytomany = $data_relation;
                }
            }

            return $record;
        });

        $retorno = [];
        foreach ($records as $row) {
            $retorno[] = GetData::getRelationData($data_type, $row);
        }

        $data =[];

        foreach ($retorno as $row) {

            $reto['start'] =$row->data_inicio; 
            $reto['end'] =$row->data_fim;
            $reto['title'] =$row->nome;
            $reto['content'] =$row->descricao; 
            $reto['class'] ='sport'; 
            $data[] = $reto;
        }

        $entities['data'] = $data;
        $entities['dataBruto'] = $retorno;
         
        return $entities;
    }
}
