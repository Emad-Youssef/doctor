<?php

namespace App\DataTables;

use App\Work;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class WorkDatatables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('day', 'dashboard.workTimes.btn.day')
            ->addColumn('action', 'dashboard.workTimes.btn.button')
            ->rawColumns(['day','action'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Work $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Work $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('workdatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make(['className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-plus"></i> '. trans('site.create'),'action' =>
                       " function() {
                            window.location.href = '".\URL::current()."/create';
                        }"]),
                        Button::make(['extend' => 'export','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-plus"></i> ' . trans('site.export')]),
                        Button::make(['extend' => 'print','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-print"></i> ' . trans('site.print')]),
                        Button::make(['extend' => 'reset','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-undo"></i> ' . trans('site.reset')]),
                        Button::make(['extend' => 'reload','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-refresh"></i> ' . trans('site.reload')])
                    )
                    ->parameters([
                        'initComplete' => "function () {
                            this.api().columns([1,2]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                input.style.width = '150px';
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }",
                        'language' => [
                            // 'url' => route('dashboard.lang')
                            "sProcessing"       =>     trans('site.sProcessing'),
                            "sLengthMenu"       =>     trans('site.sLengthMenu'),
                            "sZeroRecords"      =>     trans('site.sZeroRecords'),
                            "sEmptyTable"       =>     trans('site.sEmptyTable'),
                            "sInfo"             =>     trans('site.sInfo'),
                            "sInfoEmpty"        =>     trans('site.sInfoEmpty'),
                            "sInfoFiltered"     =>     trans('site.sInfoFiltered'),
                            "sInfoPostFix"      =>     trans('site.sInfoPostFix'),
                            "sSearch"           =>     trans('site.sSearch'),
                            "sUrl"              =>     trans('site.sUrl'),
                            "sInfoThousands"    =>     trans('site.sInfoThousands'),
                            "sLoadingRecords"   =>     trans('site.sLoadingRecords'),
                            "oPaginate" =>[
                                "sFirst"    =>   trans('site.sFirst'),
                                "sLast"     =>   trans('site.sLast'),
                                "sNext"     =>   trans('site.sNext'),
                                "sPrevious" =>   trans('site.sPrevious')
                            ],
                            "oAria"=> [
                                "sSortAscending"    =>     trans('site.sSortAscending'),
                                "sSortDescending"   =>     trans('site.sSortDescending')
                            ]
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
            Column::make('id')->title(trans('site.id')),
            Column::computed('day')
            ->exportable(false)
            ->printable(false)
            ->width(60)
            ->title(trans('site.day')),
            Column::make('created_at')->title(trans('site.created_at')),
            Column::make('updated_at')->title(trans('site.updated_at')),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->title(trans('site.action'))
            ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'WorkDatatables_' . date('YmdHis');
    }
}
