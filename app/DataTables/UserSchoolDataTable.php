<?php

namespace App\DataTables;

use App\Models\School;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserSchoolDataTable extends DataTable
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
        
        return $dataTable
            ->addColumn('action', 'users.datatables_user_school_actions')
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
                return $school->displayFacilities();
            })
            ->addColumn('status_name', function($school){
                return "<span class=\"badge badge-".$school->whatStatusColors()."\">".$school->whatStatus()."</span>";
            })
            ->addColumn('assignee_name', function($school){
                return !empty($school->pic)?$school->pic->name:'';
            })
            ->filterColumn('level_name', function($query, $keyword) {
                $query->whereHas('level', function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->filterColumn('city_name', function($query, $keyword) {
                $query->whereHas('city', function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->rawColumns(['action', 'status_name', 'facility'])
            ->orderColumn('status_name', 'status $1')
            ->orderColumn('assignee_name', 'assignee_name $1')
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
        return $model->newQuery()
            ->selectRaw('schools.*, users.name AS assignee_name, CONCAT(cities.name, ", ", provinces.name) AS city_name')
            ->leftjoin('users', 'users.id', '=', 'schools.assignee')
            ->join('cities', 'cities.id', '=', 'schools.city_id')
            ->join('provinces', 'provinces.id', '=', 'cities.province_id')
            ->where('schools.assignee', $this->id);
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
                // 'processing'=> true,
                // 'serverSide'=> true,
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
            'status_name' => ['searchable' => false, 'title' => 'Status', 'class' => 'text-center', 'orderable' => true],
            'assignee_name' => ['searchable' => true, 'title' => 'PIC','class' => 'text-center', 'orderable' => true]
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
