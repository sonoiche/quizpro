<?php

namespace App\DataTables\Teacher;

use App\Models\Admin\Section;
use App\Models\Teacher\Classroom;
use App\Models\Teacher\Exam;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ExamDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('classroom_ids', function (Exam $exam) {
                if(isset($exam->classroom_ids)) {
                    $section_ids = explode(',', $exam->classroom_ids);
                    $content     = '';
                    $sections    = Section::whereIn('id', $section_ids)
                        ->where('status', 'Enable')
                        ->get();
                    foreach ($sections as $section) {
                        $content .= $section->name . ', ';
                    }
                    return substr($content, 0, -2);
                }

                return '';
            })
            ->editColumn('created_at', function (Exam $exam) {
                return $exam->created_at->format('F d, Y');
            })
            ->addColumn('action', 'teacher.exams.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Exam $model): QueryBuilder
    {
        $user_id = auth()->user()->id;
        $classroom_ids = Classroom::where('instructor_id', $user_id)->pluck('id');
        return $model->whereIn('classroom_id', $classroom_ids);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('exam-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
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
            Column::make(['data' => 'created_at', 'title' => 'Date Created']),
            Column::make(['data' => 'name', 'title' => 'Title']),
            Column::make(['data' => 'classroom_ids', 'title' => 'Section / Block']),
            Column::make(['data' => 'items', 'title' => 'Number of Items'])
                ->addClass('text-center')
                ->sortable(false)
                ->searchable(false),
            Column::make(['data' => 'passing_grade', 'title' => 'Passing Grade'])
                ->addClass('text-center')
                ->sortable(false)
                ->searchable(false),
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
        return 'Exam_' . date('YmdHis');
    }
}
