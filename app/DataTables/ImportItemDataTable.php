<?php

namespace App\DataTables;

use App\Models\ImportItem;
use Form;
use Yajra\Datatables\Services\DataTable;

class ImportItemDataTable extends DataTable
{
    public $importId = null;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'import_items.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $importItems = ImportItem::query()
            ->select([
                'import_item.id as id',
                'import_item.uuid as uuid',
                'import.name as import_name',
                'product.code as product_code',
                'product.name as product_name',
                'import_item.quantity as quantity',
            ])
            ->join('product', 'import_item.product_id', '=', 'product.id')
            ->join('import', 'import_item.import_id', '=', 'import.id');

        if ($this->importId) {
            $importItems = $importItems->where('import_item.import_id', $this->importId);
        }

        return $importItems;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'product_code' => ['name' => 'product_code'],
            'product_name' => ['name' => 'product_name'],
            'quantity' => ['name' => 'quantity', 'data' => 'quantity']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'importItems';
    }
}
