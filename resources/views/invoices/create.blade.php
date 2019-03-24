@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="columns">
            <div class="column">
                <h3 class="title">
                        Factura noua
                </h3>
            </div>
            <div class="column">
                <!-- Right side -->
                <div class="level-right">
                    <p class="level-item"><a href="{{route('invoices.index')}}" style="text-decoration: none" class="button is-link is-outlined">Go to Dashboard</a></p>
                </div>
            </div>
        </div>
        <form action="/invoices" method="POST">
            @csrf
            
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Client</label>
                        <div class="control">
                            <input class="input is-small" type="text" value = "{{old('client')}}" name = "client" placeholder="Client" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Invoice Number</label>
                        <div class="control">
                            <input class="input is-small {{$errors->has('invoiceNo') ? 'is-danger':''}}" type="text" value = "{{old('invoiceNo')}}" name = "invoiceNo" placeholder="Invoice No" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Client Address</label>
                        <div class="control">
                            <input class="input is-small" type="text" name = "clientAddress" value = "{{old('clientAddress')}}" placeholder="Client Address" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <label class="label">Reference</label>
                        <div class="control">
                            <input class="input is-small" type="text" value = "{{old('title')}}" name = "title" placeholder="Reference" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Invoice Date</label>
                        <div class="control">
                            <input class="input is-small" type="date" value = "{{old('invoiceDate')}}" name = "invoiceDate" placeholder="Invoice Date" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Due Date</label>
                        <div class="control">
                            <input class="input is-small" type="date" value = "{{old('dueDate')}}" name = "dueDate" placeholder="Due Date" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Status</label>
                        <div class="select is-small" name = "status" required>
                            <select>
                                <option value = "unpaid" selected>Unpaid</option>
                                <option value = "paid">Paid</option>
                                <option value = "cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns itemsRow is-vcentered">
                <div class="column">
                    <div class="field">
                        <label class="label">Item description</label>
                        <div class="control">
                            <input class="input is-small" type="text" value = "{{old('item')}}" name = "item[]" placeholder="Item description" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Unit price</label>
                        <div class="control">
                            <input class="input is-small" type="number" value = "{{old('unitPrice')}}" name = "unitPrice[]" placeholder="Unit price" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Quantity</label>
                        <div class="control">
                            <input class="input is-small" type="number" value = "{{old('qty')}}" name = "qty[]" placeholder="Quantity" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Total</label>
                        <div class="control">
                            <input class="input is-small" type="number" value = {{'unit_price*qty name'}} name = "total[]" placeholder={{'unit_price*qty name'}} disabled>
                        </div>
                    </div>
                </div>
                <div class="column is-1">
                    <a class="button is-danger is-outlined is-small">
                        <span class="icon is-small">
                            <i class="fas fa-times"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="columns itemsRow is-vcentered">
                <div class="column">
                    <div class="field">
                        <label class="label">Item description</label>
                        <div class="control">
                            <input class="input is-small" type="text" value = "{{old('item')}}" name = "item[]" placeholder="Item description" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Unit price</label>
                        <div class="control">
                            <input class="input is-small" type="number" value = "{{old('unitPrice')}}" name = "unitPrice[]" placeholder="Unit price" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Quantity</label>
                        <div class="control">
                            <input class="input is-small" type="number" value = "{{old('qty')}}" name = "qty[]" placeholder="Quantity" required>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="field">
                        <label class="label">Total</label>
                        <div class="control">
                            <input class="input is-small" type="number" value = {{'unit_price*qty name'}} name = "total[]" placeholder={{'unit_price*qty name'}} disabled>
                        </div>
                    </div>
                </div>
                <div class="column is-1">
                    <a class="button is-danger is-outlined is-small">
                        <span class="icon is-small">
                            <i class="fas fa-times"></i>
                        </span>
                    </a>
                </div>
            </div>


            <div class="columns">
                <div class="column is-2">
                    <!-- left side -->
                    <div class="field is-pulled-left">
                        <p class="control">
                            <a class="button is-primary is-outlined is-small" style="text-decoration: none">Add row</a>
                        </p>
                    </div>
                </div>
                <div class="column is-4 is-offset-6">
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Subtotal</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-small" type="number" name = "subtotal" placeholder="Subtotal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="columns">
                <div class="column is-4 is-offset-8">
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Discount</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-small" type="number" name = "discount" placeholder="Discount" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns">
                <div class="column is-4">
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Terms and Conditions</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <textarea class="input is-small" name = "termsAndConditions" placeholder="Terms and conditions"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4 is-offset-4">
                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">Grand Total</label>
                        </div>
                        <div class="field-body">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-small" type="number" name = "total" placeholder="Total" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link">Save</button>
                </div>
                <div class="control">
                    <button class="button is-text">Cancel</button>
                </div>
            </div>
            @include ('invoices.errors')
        </form>

    </div>
@endsection
