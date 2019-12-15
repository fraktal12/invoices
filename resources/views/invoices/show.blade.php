@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <h3 class="title">
                    View invoice - {{$invoice->invoiceNo}}
                </h3>
            </div>
            <div class="column">
                <!-- Right side -->
                <div class="field is-grouped is-pulled-right">
                    <p class="control">
                        <a href="{{route('invoices.index')}}" style="text-decoration: none" class="button is-primary is-outlined">Go to Dashboard</a>
                    </p>
                    <p class="control">
                        <a class="button is-link is-outlined" href="/invoices/{{$invoice->id}}/edit" style="text-decoration: none">Edit</a>
                    </p>
                    <form method="POST" action="/invoices/{{$invoice->id}}">
                        @csrf
                        @method('DELETE')
                        <div class="control">
                            <button  class="button is-danger is-outlined">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr class="navbar-divider">
    <div class="container ">
        <div class="level is-small">
            <div class="level-left">
                <div class = "level-item is-pulled-left"> To: {{$invoice->client}}</div>
            </div>
            <div class="level-right ">
                <div class = "level-item is-pulled-right">Number: {{$invoice->invoiceNo}}</div>
            </div>
        </div>
        <div class="level">
            <div class="level-left">
                <div class = "level-item is-pulled-left">{{$invoice->clientAddress}}</div>
            </div>
            <div class="level-right ">
                <div class = "level-item is-pulled-right">Date: {{$invoice->invoiceDate}}</div>
            </div>
        </div>
        <div class="level">
            <div class="level-left">
                <div class = "level-item is-pulled-left"></div>
            </div>
            <div class="level-right ">
                <div class = "level-item is-pulled-right">Due Date: {{$invoice->dueDate}}</div>
            </div>
        </div>
        <div class="level">
            <div class="level-left">
                <div class = "level-item is-pulled-left">Reference: {{$invoice->title}}</div>
            </div>
            <div class="level-right ">
                <div class = "level-item is-pulled-right">Status: {{$invoice->status}}</div>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table is-striped is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th><abbr title="Item name">Item</abbr></th>
                    <th><abbr title="Quantity">Qty</abbr></th>
                    <th><abbr title="Item price">Price</th>
                    <th class = "has-text-right"><abbr title="Subtotal">Total</abbr></th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($invoice->invoiceItems->pluck('item')); $i++)
                    <tr>
                        <td>{{$invoice->invoiceItems->pluck('item')[$i]}}</td>
                        <td>{{$invoice->invoiceItems->pluck('qty')[$i]}}</td>
                        <td>{{$invoice->invoiceItems->pluck('unitPrice')[$i]}} RON</td>
                        <td class = "has-text-right">{{$invoice->invoiceItems->pluck('qty')[$i] * $invoice->invoiceItems->pluck('unitPrice')[$i]}} RON</td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="level">
            <div class="level-left">
                <div class = "level-item is-pulled-left"></div>
            </div>
            <div class="level-right ">
                <div class = "level-item is-pulled-right has-text-weight-bold">Subtotal: {{$invoice->subTotal}} RON</div>
            </div>
        </div>
        <div class="level">
            <div class="level-left">
                <div class = "level-item is-pulled-left"></div>
            </div>
            <div class="level-right ">
                <div class = "level-item is-pulled-right has-text-weight-bold">Discount: {{$invoice->discount}} %</div>
            </div>
        </div>
        <div class="level">
            <div class="level-left">
                <div class = "level-item is-pulled-left"></div>
            </div>
            <div class="level-right ">
                <div class = "level-item is-pulled-right has-text-weight-bold">Grand Total: {{$invoice->grandTotal}} RON</div>
            </div>
        </div>
        <div class="level">
            <article class="message is-primary is-small">
                <div class="message-body">
                    {{$invoice->termsAndConditions == null ? 'Terms and Conditions' : $invoice->termsAndConditions}}
                </div>
              </article>
        </div>
    </div>
@endsection


