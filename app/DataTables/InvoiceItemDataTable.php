<?php

namespace App\DataTables;

use App\Models\InvoiceItem;
use Form;
use Illuminate\Support\Facades\DB;
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
            ->skipPaging()
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
//        $invoiceItems = InvoiceItem::query();

        $invoiceItems = InvoiceItem::query()
            ->select([
                'invoice_item.id as id',
                'invoice_item.uuid as uuid',
                'invoice_item.order as order',
                'invoice_item.quantity as quantity',
                'invoice_item.price as price',
                'product.code as product_code',
                'product.name as product_name',
            ])
            ->join('product', 'invoice_item.product_id', '=', 'product.id');

        if ($this->invoiceId) {
            $invoiceItems = $invoiceItems->where('invoice_item.invoice_id', $this->invoiceId);
        }

//        return $this->applyScopes($invoiceItems);

        return $invoiceItems;
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
//            'id' => ['name' => 'id', 'data' => 'id'],
//            'uuid' => ['name' => 'uuid', 'data' => 'uuid'],
//            'invoice_id' => ['name' => 'invoice_id', 'data' => 'invoice_id'],
            'order' => ['name' => 'order'],
            'product_code' => ['name' => 'product_code'],
            'product_name' => ['name' => 'product_name'],
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
