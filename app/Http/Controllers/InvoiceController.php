<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    // Liste aller Rechnungen anzeigen
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get();
        return view('invoice', compact('invoices'));
    }

    // Formular für neue Rechnung anzeigen
    public function create()
    {
        return view('invoiceedit');
    }

    // Neue Rechnung speichern
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|string|max:50|unique:invoice,invoice_number',
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'user' => 'required|string|max:100',
        ]);

        $invoice = new Invoice();
        $invoice->invoice_number = $request->invoice_number;
        $invoice->price = $request->price;
        $invoice->date = $request->date;
        $invoice->user = $request->user;
        $invoice->save();

        return redirect()->route('invoice.index');
    }

    // Rechnung bearbeiten (Formular anzeigen)
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoiceedit', compact('invoice'));
    }

    // Änderungen speichern
    public function update(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);

        $request->validate([
            'invoice_number' => 'required|string|max:50|unique:invoice,invoice_number,' . $invoice->id,
            'price' => 'required|numeric|min:0',
            'date' => 'required|date',
            'user' => 'required|string|max:100',
        ]);

        $invoice->invoice_number = $request->invoice_number;
        $invoice->price = $request->price;
        $invoice->date = $request->date;
        $invoice->user = $request->user;
        $invoice->save();

        return redirect()->route('invoice.index');
    }

    // Bestätigungsseite für das Löschen anzeigen
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('invoicedelete', compact('invoice'));
    }

    // Rechnung löschen
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('invoice.index');
    }
}