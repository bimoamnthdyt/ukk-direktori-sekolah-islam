<?php

namespace App\DataTables;

use App\Models\School;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UnverifiedSchoolDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'schools.datatables_actions')
            ->addColumn('level_name', function($school){
                return $school->level->name;
            })
            ->addColumn('city_name', function($school){
                $city_name = "";

                if(!empty($school->city)) {
                    $city_name = $school->city_province();
                }

                return $city_name;
            })
            ->addColumn('facility', function($school){
                $html = "";

                foreach($school->facilities as $fct) {
                    $facility = $fct->facility;

                    if(empty($facility)) {
                        continue;
                    }

                    $html .= "<i title=\"".$facility->name."\" style=\"font-size:24px;\" class=\"text-success fas ".$facility->icon."\"></i>&nbsp;";
                }

                return $html;
            })
            ->filterColumn('level_name', function($query, $keyword) {
                $query->whereHas('level', function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->addColumn('creator_name', function($school){
                return !empty($school->creator)?$school->creator->name:'';
            })
            ->rawColumns(['action', 'facility'])
            ->orderColumn('level_name', 'level_name $1')
            ->orderColumn('creator_name', 'creator_name $1')
            ->orderColumn('city_name', 'city_name $1');
            
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\School $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(School $model)
    {
        // return $model->newQuery()->whereNull('verified_at');
        return $model->newQuery()
            ->selectRaw('schools.*, users.name AS creator_name, levels.name AS level_name, CONCAT(cities.name, ", ", provinces.name) AS city_name')
            ->join('users', 'users.id', '=', 'schools.created_by')
            ->join('levels', 'levels.id', '=', 'schools.level_id')
            ->join('cities', 'cities.id', '=', 'schools.city_id')
            ->join('provinces', 'provinces.id', '=', 'cities.province_id')
            ->whereNull('schools.verified_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom'       => 'lfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[10, 25, 50, -1], [10, 25, 50, "All"]]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'action' => ['searchable' => false, 'visible' => true, 'orderable' => false, 'width' => '50'],
            'updated_at' => ['searchable' => false, 'visible' => false],
            'nama_sekolah' => ['searchable' => true, 'title' => 'Name', 'orderable' => true],
            'city_name' => ['searchable' => true, 'title' => 'City', 'class' => 'text-center', 'orderable' => true],
            'level_name' => ['searchable' => true, 'title' => 'Level', 'class' => 'text-center', 'width' => '100'],
            'creator_name' => ['searchable' => true, 'title' => 'Created By','class' => 'text-center', 'orderable' => true]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'schoolsdatatable_' . time();
    }
}
