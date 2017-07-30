<?php

namespace App\Http\Controllers;

use App\DataTables\InvoiceItemDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Repositories\InvoiceItemRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class InvoiceItemController extends AppBaseController
{
    /** @var  InvoiceItemRepository */
    private $invoiceItemRepository;

    public function __construct(InvoiceItemRepository $invoiceItemRepo)
    {
        $this->invoiceItemRepository = $invoiceItemRepo;
    }

    /**
     * Display a listing of the InvoiceItem.
     *
     * @param InvoiceItemDataTable $invoiceItemDataTable
     * @return Response
     */
    public function index(InvoiceItemDataTable $invoiceItemDataTable, $invoiceId = null)
    {
        return $invoiceItemDataTable->render('invoice_items.index');
    }

    public function showInvoiceItemsByInvoiceId(Request $request, $invoiceId, InvoiceItemDataTable $invoiceItemDataTable)
    {
        return $this->index($invoiceItemDataTable, $invoiceId);
    }

    /**
     * Show the form for creating a new InvoiceItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('invoice_items.create');
    }

    /**
     * Store a newly created InvoiceItem in storage.
     *
     * @param CreateInvoiceItemRequest $request
     *
     * @return Response
     */
    public function store(CreateInvoiceItemRequest $request)
    {
        $input = $request->all();

        $invoiceItem = $this->invoiceItemRepository->create($input);

        Flash::success('Invoice Item saved successfully.');

        return redirect(route('invoiceItems.index'));
    }

    /**
     * Display the specified InvoiceItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoiceItem = $this->invoiceItemRepository->findWithoutFail($id);

        if (empty($invoiceItem)) {
            Flash::error('Invoice Item not found');

            return redirect(route('invoiceItems.index'));
        }

        return view('invoice_items.show')->with('invoiceItem', $invoiceItem);
    }

    /**
     * Show the form for editing the specified InvoiceItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoiceItem = $this->invoiceItemRepository->findWithoutFail($id);

        if (empty($invoiceItem)) {
            Flash::error('Invoice Item not found');

            return redirect(route('invoiceItems.index'));
        }

        return view('invoice_items.edit')->with('invoiceItem', $invoiceItem);
    }

    /**
     * Update the specified InvoiceItem in storage.
     *
     * @param  int              $id
     * @param UpdateInvoiceItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvoiceItemRequest $request)
    {
        $invoiceItem = $this->invoiceItemRepository->findWithoutFail($id);

        if (empty($invoiceItem)) {
            Flash::error('Invoice Item not found');

            return redirect(route('invoiceItems.index'));
        }

        $invoiceItem = $this->invoiceItemRepository->update($request->all(), $id);

        Flash::success('Invoice Item updated successfully.');

        return redirect(route('invoiceItems.index'));
    }

    /**
     * Remove the specified InvoiceItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoiceItem = $this->invoiceItemRepository->findWithoutFail($id);

        if (empty($invoiceItem)) {
            Flash::error('Invoice Item not found');

            return redirect(route('invoiceItems.index'));
        }

        $this->invoiceItemRepository->delete($id);

        Flash::success('Invoice Item deleted successfully.');

        return redirect(route('invoiceItems.index'));
    }
}
