<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice - {{$invoice->invoiceNo}}</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">

    <div>
        <div class="row">
            <div class="col-xs-7">
                <h4>From:</h4>
                <strong>Bellatrix Media SRL - Invoice</strong><br>
                Aleea Fuiorului 4 <br>
                Bucuresti Romania - 032173<br>
                T: +40723239457 <br>
                E: stefi.radulescu@gmail.com <br><br>
            </div>

            <div class="col-xs-4">
                <img src="https://res.cloudinary.com/dqzxpn5db/image/upload/v1537151698/website/logo.png" alt="logo">
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
                <h4>To:</h4>
                <address>
                    <strong>{{$invoice->client}}</strong><br>
                    <span>{{$invoice->clientAddress}}</span> 
                </address>
            </div>
            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>Invoice Num:</th>
                            <td class="text-right">{{$invoice->invoiceNo}}</td>
                        </tr>
                        <tr>
                            <th> Invoice Date: </th>
                            <td class="text-right">{{$invoice->invoiceDate}}</td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>

                <table style="width: 100%; margin-bottom: 20px">
                    <tbody>
                        <tr class="well" style="padding: 5px">
                            <th style="padding: 5px"><div> Balance Due </div></th>
                            <td style="padding: 5px" class="text-right"><strong> {{$invoice->grandTotal}} RON</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <table class="table">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>Item List</th>
                    <th>Qty.</th>
                    <th>Unit price</th>
                    <th class="has-text-right">Total</th>
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

            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Balance Due </div></th>
                                <td style="padding: 5px" class="text-right"><strong> {{$invoice->grandTotal}} RON</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <div class="row">
                <div class="col-xs-8 invbody-terms">
                    Thank you for your business! <br>
                    <br>
                    <h4>Payment Terms</h4>
                    <p>{{$invoice->termsAndConditions}}</p>
                </div>
            </div>
        </div>

    </body>
</html>

{{-- @section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <h3 class="title">
                    Invoice - {{$invoice->invoiceNo}}
                </h3>
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
@endsection --}}
