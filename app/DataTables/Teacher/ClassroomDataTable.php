<?php

namespace App\DataTables\Teacher;

use App\Models\Teacher\Classroom;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClassroomDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('student_count', function(Classroom $classroom) {
                $data['classroom']      = $classroom;
                $data['studentsCount']  = User::where('role', User::ROLE_STUDENT)->where('section', $classroom->section)->count();
                return view('teacher.classrooms.student-count', $data);
            })
            ->addColumn('action', 'teacher.classrooms.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Classroom $model): QueryBuilder
    {
        $id = auth()->user()->id;
        return $model->where('instructor_id', $id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('classroom-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0, 'asc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
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
            Column::make(['data' => 'name', 'title' => 'Class Name']),
            Column::make(['data' => 'subject', 'title' => 'Subject']),
            Column::make(['data' => 'section', 'title' => 'Section / Block']),
            Column::make(['data' => 'student_count', 'title' => '# of Students'])
                ->addClass('text-center')
                ->sortable(false)
                ->searchable(false),
            Column::make(['data' => 'schedule', 'title' => 'Schedule']),
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
        return 'Classroom_' . date('YmdHis');
    }
}
