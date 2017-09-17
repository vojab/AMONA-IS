<?php

namespace App\Http\Controllers;

use App\DataTables\InvoiceItemDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInvoiceItemRequest;
use App\Http\Requests\UpdateInvoiceItemRequest;
use App\Repositories\InvoiceItemRepository;
use App\Repositories\InvoiceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Response;

class InvoiceItemController extends AppBaseController
{
    /** @var  InvoiceItemRepository */
    private $invoiceRepository;
    private $invoiceItemRepository;

    public function __construct(InvoiceItemRepository $invoiceItemRepository, InvoiceRepository $invoiceRepository)
    {
        $this->middleware('auth');

        $this->invoiceRepository = $invoiceRepository;
        $this->invoiceItemRepository = $invoiceItemRepository;
    }

    /**
     * Display a listing of the InvoiceItem.
     *
     * @param InvoiceItemDataTable $invoiceItemDataTable
     * @return Response
     */
    public function index(InvoiceItemDataTable $invoiceItemDataTable, $invoiceId)
    {
        $invoice = $this->invoiceRepository->findWithoutFail($invoiceId);

        if (empty($invoice)) {
            Flash::error('invoice not found');

            return redirect(route('invoices.index'));
        }
        return $invoiceItemDataTable->render('invoice_items.index', ['invoice' => $invoice]);
    }

    public function showInvoiceItemsByInvoiceId($invoiceId, InvoiceItemDataTable $invoiceItemDataTable)
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

    public function createInvoiceItem($invoiceId)
    {
        $invoice = $this->invoiceRepository->findWithoutFail($invoiceId);

        if (empty($invoice)) {
            Flash::error('invoice not found');

            return redirect(route('invoices.index'));
        }

        return view('invoice_items.create', ['invoice' => $invoice]);
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

        return redirect(route('invoiceItemsByInvoiceId', ['invoiceId' => $invoiceItem->invoice->id]));
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
        $invoiceId = $invoiceItem->invoice->id;

        if (empty($invoiceItem)) {
            Flash::error('Invoice Item not found');

            return redirect(route('invoiceItems.index'));
        }

        $this->invoiceItemRepository->delete($id);

        Flash::success('Invoice Item deleted successfully.');

        return redirect(route('invoiceItemsByInvoiceId', ['invoiceId' => $invoiceId]));
    }
}
