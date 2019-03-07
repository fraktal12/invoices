<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\InvoiceItems;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        //return view('invoices.index', ['invoices'=>$invoices]);
        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // required - used in the server side validation
        $attributes = $request->validate([
            'invoiceNo'=>['required'],
            'invoiceDate'=>['required'],
            'dueDate'=>['required'],
            'title'=>'nullable|max:100',
            'client'=>'required|max:100',
            'clientAddress'=>'required|max:100',
            'subtotal'=>['required'],
            'discount'=>'required|numeric|min:0',
            'total'=>['required']
            ]);

            // insert the invoice data
            //$invoice = Invoice::create($attributes);
            $invoice = new Invoice;


            $attributesItems = $request->validate([
                'item'=>['required'],
                'qty'=>'required|integer|min:1',
                'unitPrice'=>'required|numeric|min:0'
            ]);

            $invoice->subTotal = $attributesItems['qty'] * $attributesItems['unitPrice'];

            // add the id to the attributes passed to invoice_items model:create method
            $attributesItems['invoiceId'] = $invoice->id;
            //dd($attributesItems);
            //InvoiceItems::create($attributesItems);

            //$invoice->invoiceItems()->saveMany([new InvoiceItems($attributesItems)]);
            return redirect('/invoices');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
