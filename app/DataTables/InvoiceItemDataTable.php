<?php

namespace App\DataTables;

use App\Models\InvoiceItem;
use Form;
use Yajra\Datatables\Services\DataTable;

class InvoiceItemDataTable extends DataTable
{
    public $invoiceId = null;

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'invoice_items.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $invoiceItems = InvoiceItem::query();

        if ($this->invoiceId) {
            $invoiceItems = $invoiceItems->where('invoice_id', $this->invoiceId);
        }

        return $this->applyScopes($invoiceItems);
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
            'uuid' => ['name' => 'uuid', 'data' => 'uuid'],
            'invoice_id' => ['name' => 'invoice_id', 'data' => 'invoice_id'],
            'product_id' => ['name' => 'product_id', 'data' => 'product_id'],
            'quantity' => ['name' => 'quantity', 'data' => 'quantity'],
            'price' => ['name' => 'price', 'data' => 'price']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'invoiceItems';
    }
}
