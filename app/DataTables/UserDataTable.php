<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class UserDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'users.datatables_actions');

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        // return $model->newQuery();
        return $model->newQuery()
            ->selectRaw('users.*, (SELECT count(assignee) FROM schools WHERE assignee = users.id) AS count_school');
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
                'dom'     => 'frtip',
                'order'   => [[0, 'desc']],
                "sScrollX" => "100%",
                "sScrollXInner" => "100%",
                'buttons' => [
                    //['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    //['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
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
            'name',
            'email',
            'role',
            'count_school' => ['searchable' => true, 'title' => 'Schools', 'class' => 'text-center', 'orderable' => true],
            'action',
            //'password',
            //'remember_token'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'usersdatatable_' . time();
    }
}
