<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    protected $table = 'invoices';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'invoice_no',
        'invoice_date',
        'client_details',
        'total_before_tax',
        'sgst',
        'cgst',
        'total_after_tax',
        'amount_in_words',
        'bank_name',
        'account_no',
        'ifsc_code',
        'gst_no',
        'bank_address',
        'generated_by',
        'status'        
    ];

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItemModel::class, 'invoice_id');
    }
}
