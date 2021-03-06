<?php

namespace App\DataTables;

use App\Rosheta;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class RoshetaDatatables extends DataTable
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
            ->addColumn('checkbox', 'dashboard.rosheta.btn.check')
            ->addColumn('action', 'dashboard.rosheta.btn.button')
            ->rawColumns(['checkbox','action'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Rosheta $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Rosheta $model)
    {
        return $model->newQuery()->with('patient');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('roshetadatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make(['extend' => 'create','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-plus"></i> '. trans('site.create')]),
                        Button::make(['text'=> '<i class="fa fa-trash"></i> '.trans('site.deleteALL'),'className'=>'btn btn-danger btn-sm deleteAll','data-toggle'=>'modal','data-target'=>'#exampleModal']),
                        Button::make(['extend' => 'export','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-plus"></i> ' . trans('site.export')]),
                        Button::make(['extend' => 'print','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-print"></i> ' . trans('site.print')]),
                        Button::make(['extend' => 'reset','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-undo"></i> ' . trans('site.reset')]),
                        Button::make(['extend' => 'reload','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-refresh"></i> ' . trans('site.reload')])

                    )
                    ->parameters([
                        'initComplete' => "function () {
                            this.api().columns([2,3,4,5]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                input.style.width = '100px';
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
            Column::computed('checkbox')
            ->exportable(false)
            ->printable(false)
            ->width(150)
            ->title('<input type="checkbox" class="checkALL" />')
            ->addClass('text-center'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(200)
            ->title(trans('site.action'))
            ->addClass('text-center'),
            Column::make('patient.patient_name')->title(trans('site.name')),
            Column::make('patient.address')->title(trans('site.address')),
            Column::make('patient.age')->title(trans('site.age')),
            Column::make('created_at')->title(trans('site.created_at')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'RoshetaDatatables_' . date('YmdHis');
    }
}
