@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="columns">
            <div class="column">
                <h3 class="title">
                        View invoice
                </h3>
            </div>
            <div class="column">
                <!-- Right side -->
                <div class="field is-grouped is-pulled-right">
                    <p class="control">
                        <a class="button is-link is-outlined" href="/invoices/{{$invoice->id}}/edit" style="text-decoration: none">Edit</a>
                    </p>
                    <p class="control">
                        <a class="button" href="{{route('invoices.index')}}" style="text-decoration: none">Cancel</a>
                    </p>
                    <p class="control">
                        <a class="button is-danger is-outlined">Delete</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection


