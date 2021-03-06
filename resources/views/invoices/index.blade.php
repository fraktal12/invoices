@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="columns">
            <div class="column">
                <h2 class="title">
                        Sumar facturi - Bellatrix Media SRL
                </h2>
            </div>
            <div class="column">
                <!-- Right side -->
                <div class="level-right">
                    <p class="level-item"><a href="{{route('invoices.create')}}" style="text-decoration: none" class="button is-primary">Factura noua</a></p>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Factura</th>
                    <th>Client</th>
                    <th>Stare</th>
                    <th>Data facturii</th>
                    <th>Total</th>
                    <th>Actiune</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices  as $invoice)
                    <tr>
                        <td>
                            <a href="{{route('invoices.show',[$invoice->id])}}">
                                {{$invoice->invoiceNo}}
                            </a>
                        </td>
                        <td>
                            {{$invoice->client}}
                        </td>
                        <td>
                            {{$invoice->status}}
                        </td>
                        <td>
                            {{$invoice->invoiceDate}}
                        </td>
                        <td>
                            {{$invoice->grandTotal}} RON
                        </td>
                        <td>
                            <a href="{{route('invoices.show',[$invoice->id])}}" style="text-decoration: none" class="button is-small is-link is-outlined">Vizualizeaza</a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
