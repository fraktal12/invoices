<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceItems extends Model
{
    protected $guarded = [];
    /**
     * Get the items for the invoice.
     */
    public function invoice()
    {

        return $this->belongsTo(Invoice::class);
    }


}
