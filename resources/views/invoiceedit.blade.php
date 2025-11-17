@extends('layouts.app')

@section('title', isset($invoice) ? 'Rechnung bearbeiten' : 'Neue Rechnung')

@section('content')
<h1>{{ isset($invoice) ? 'Rechnung bearbeiten' : 'Neue Rechnung erstellen' }}</h1>

<form action="{{ isset($invoice) ? route('invoice.update', [$invoice->id]) : route('invoice.store') }}" method="post">
    @csrf
    @if(isset($invoice))
        @method('PUT')
        <p><strong>ID:</strong> {{ $invoice->id }}</p>
    @endif

    <label for="invoice_number">Rechnungsnummer</label>
    <input name="invoice_number" maxlength="50" value="{{ isset($invoice) ? $invoice->invoice_number : '' }}">
    <br><br>

    <label for="price">Preis</label>
    <input type="number" step="0.01" name="price" value="{{ isset($invoice) ? $invoice->price : '' }}">
    <br><br>

    <label for="date">Datum</label>
    <input type="date" name="date" value="{{ isset($invoice) ? $invoice->date : '' }}">
    <br><br>

    <label for="user">Benutzer</label>
    <input name="user" maxlength="100" value="{{ isset($invoice) ? $invoice->user : '' }}">
    <br><br>

    <input type="submit" value="{{ isset($invoice) ? 'Rechnung speichern' : 'Rechnung erstellen' }}">
</form>
@endsection