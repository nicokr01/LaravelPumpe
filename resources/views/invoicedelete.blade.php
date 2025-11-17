@extends('layouts.app')

@section('title', 'Rechnung löschen')

@section('content')
<h1>Rechnung löschen</h1>

<p>Soll die folgende Rechnung wirklich gelöscht werden?</p>

<table style="border: 2px solid black" cellpadding="6" cellspacing="0">
    <tr><td>ID:</td><td>{{ $invoice->id }}</td></tr>
    <tr><td>Rechnungsnummer:</td><td>{{ $invoice->invoice_number }}</td></tr>
    <tr><td>Preis:</td><td>{{ $invoice->price }}</td></tr>
    <tr><td>Datum:</td><td>{{ $invoice->date }}</td></tr>
    <tr><td>Benutzer:</td><td>{{ $invoice->user }}</td></tr>
</table>

<br>

<form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">OK – löschen</button>
</form>

<a href="{{ route('invoice.index') }}">Abbrechen</a>
@endsection