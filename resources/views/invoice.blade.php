@extends('layouts.app')

@section('title', 'Rechnungsübersicht')

@section('content')
    <h1>Rechnungsliste</h1>
    <a href="{{ route('invoice.create') }}">Neue Rechnung erstellen</a>
    <br><br>

    <table style="border: 2px solid black" cellpadding="6" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Rechnungsnummer</th>
                <th>Preis</th>
                <th>Datum</th>
                <th>Benutzer</th>
                <th>Aktionen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->invoice_number }}</td>
                    <td>{{ $invoice->price }}</td>
                    <td>{{ $invoice->date }}</td>
                    <td>{{ $invoice->user }}</td>
                    <td>
                        <a href="{{ route('invoice.edit', $invoice->id) }}">Bearbeiten</a> |
                        <a href="{{ route('invoice.show', $invoice->id) }}">Löschen</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection