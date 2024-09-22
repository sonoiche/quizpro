<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('fname', function (User $user) {
                return $user->fullname;
            })
            ->editColumn('created_at', function (User $user) {
                return $user->created_at->format('F d, Y');
            })
            ->addColumn('action', 'admin.users.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('user-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1, 'asc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('pdf'),
                Button::make('print')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make(['data' => 'created_at', 'title' => 'Created Date']),
            Column::make(['data' => 'fname', 'title' => 'Fullname']),
            Column::make(['data' => 'email', 'title' => 'Email Address']),
            Column::make(['data' => 'contact_number', 'title' => 'Contact Number'])
                ->addClass('text-center'),
            Column::make(['data' => 'role', 'title' => 'User Role'])
                ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
