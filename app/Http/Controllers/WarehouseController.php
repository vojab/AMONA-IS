<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouseInstance = new Warehouse();
        $warehouseDataArray = $warehouseInstance->getWarehouseData();

        return view('warehouse.index', ['warehouseDataArray' => $warehouseDataArray]);
    }
}
