<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceItemModel extends Model
{
    protected $table = 'invoice_items';
    protected $primaryKey = 'id';

    protected $fillable = [
        'invoice_id',
        'description',
        'quantity',
        'rate',
        'total'   
    ];

    public function invoice()
    {
        return $this->belongsTo(InvoiceModel::class, 'invoice_id');
    }
}
