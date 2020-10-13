<?php

namespace App\DataTables;

use App\Drug;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class ShowDrugDatatables extends DataTable
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
            ->addColumn('drugId', 'dashboard.drugs.btn.drugId')
            ->addColumn('drugName', 'dashboard.drugs.btn.drugName')
            ->addColumn('drugUse', 'dashboard.drugs.btn.drugUse')
            ->rawColumns(['drugId','drugName','drugUse'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Drug $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Drug $model)
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
                    ->setTableId('showdrugdatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(1)

                    ->parameters([
                        'initComplete' => "function () {
                            this.api().columns([0,1]).every(function () {
                                var column = this;
                                var input = document.createElement(\"input\");
                                input.style.width = '150px';
                                $(input).appendTo($(column.footer()).empty())
                                .on('keyup', function () {
                                    column.search($(this).val(), true, true, true).draw();
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
            Column::make('drug_name')->title(trans('site.drug_name')),
            Column::make('drug_use')->title(trans('site.drug_use')),
            Column::computed('drugId')
            ->exportable(true)
            ->printable(true)
            ->title(' ')
            ->addClass('hidden'),
            Column::computed('drugName')
            ->exportable(true)
            ->printable(true)
            ->title(' ')
            ->addClass('hidden'),
            Column::computed('drugUse')
            ->exportable(true)
            ->printable(true)
            ->title(' ')
            ->addClass('hidden'),


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ShowDrugDatatables_' . date('YmdHis');
    }
}
