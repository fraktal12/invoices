@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="columns">
            <div class="column">
                <h2 class="title">
                        Invoices
                </h2>
            </div>
            <div class="column">
                <!-- Right side -->
                <div class="level-right">
                    <p class="level-item"><a href="{{route('invoices.create')}}" style="text-decoration: none" class="button is-primary">New invoice</a></p>
                </div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Reference</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>Due</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices  as $invoice)
                    <tr>
                        <td>
                            <a href="{{route('invoices.show',[$invoice->id])}}">
                                {{$invoice->title}}
                            </a>
                        </td>
                        <td>
                            {{$invoice->client}}
                        </td>
                        <td>
                            {{$invoice->status}}
                        </td>
                        <td>
                            {{$invoice->dueDate}}
                        </td>
                        <td>
                            {{$invoice->total}}
                        </td>
                        <td><a href="{{route('invoices.show',[$invoice->id])}}">View Invoice</a></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
