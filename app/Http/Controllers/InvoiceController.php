<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $invoices = Invoice::where("user_id", $user_id)->with('toys')->get();
        $finalInvoice = [];

        if ($invoices) {
            foreach ($invoices as $invoice) {
                $invoiceDetails = InvoiceDetail::where("invoice_header_id", $invoice->id)->with('toys')->get();
                $finalInvoice[] = [
                    "invoice" => $invoice,
                    "invoiceDetail" => $invoiceDetails
                ];
            }
        }

        return view('invoice.index', compact("finalInvoice"));
    }

}
