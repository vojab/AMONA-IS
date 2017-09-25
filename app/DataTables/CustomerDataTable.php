<?php

namespace App\DataTables;

use App\Models\Customer;
use Form;
use Yajra\Datatables\Services\DataTable;

class CustomerDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'customers.datatables_actions')
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
        $customers = Customer::query();

        return $this->applyScopes($customers);
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
//            'uuid' => ['name' => 'uuid', 'data' => 'uuid'],
            'name' => ['name' => 'name', 'data' => 'name'],
            'oib' => ['name' => 'oib', 'data' => 'oib'],
            'address' => ['name' => 'address', 'data' => 'address'],
            'city' => ['name' => 'city', 'data' => 'city'],
            'post_code' => ['name' => 'post_code', 'data' => 'post_code'],
//            'state' => ['name' => 'state', 'data' => 'state'],
            'country' => ['name' => 'country', 'data' => 'country'],
            'phone_number_1' => ['name' => 'phone_number_1', 'data' => 'phone_number_1'],
//            'phone_number_2' => ['name' => 'phone_number_2', 'data' => 'phone_number_2'],
//            'fax' => ['name' => 'fax', 'data' => 'fax'],
            'email_1' => ['name' => 'email_1', 'data' => 'email_1'],
//            'email_2' => ['name' => 'email_2', 'data' => 'email_2'],
            'web_address' => ['name' => 'web_address', 'data' => 'web_address']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'customers';
    }
}
