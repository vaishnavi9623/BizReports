<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\InvoiceModel;
use App\Models\InvoiceItemModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\MailPortal;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = InvoiceModel::query();
    
        if ($request->filled('user')) {
            $search = $request->user;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('generated_by', 'like', "%{$search}%");
            });
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
    
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
    
        $invoicelist = $query->orderBy('created_at', 'desc')->get();
        // dd($invoicelist);
        return view('invoice', compact('invoicelist'));
    }
    
    public function saveinvoice(Request $request)
    {
        // dd($request);
        $validate = $request->validate([
            'invoice_title'=>'required',
            'invoice_no'=>'required',
            'invoice_date'=>'required',
            'client_details'=>'required',
            'subtotal'=>'required',
            'cgst'=>'required',
            'sgst'=>'required',
            'grand_total'=>'required',
            'amount_in_words'=>'required',
            'bank_name'=>'required',
            'account_no'=>'required',
            'ifsc_code'=>'required',
            'gst_no'=>'required',
            'bank_address'=>'required',
            'status'=>'required',
            'generated_by'=>'required',
        ]);

        $invoice = InvoiceModel::create([
            'title'=>$validate['invoice_title'],
            'invoice_no'=>$validate['invoice_no'],
            'invoice_date'=>$validate['invoice_date'],
            'client_details'=>$validate['client_details'],
            'total_before_tax'=>$validate['subtotal'],
            'sgst'=>$validate['sgst'],
            'cgst'=>$validate['cgst'],
            'total_after_tax'=>$validate['grand_total'],
            'amount_in_words'=>$validate['amount_in_words'],
            'bank_name'=>$validate['bank_name'],
            'ifsc_code'=>$validate['ifsc_code'],
            'gst_no'=>$validate['gst_no'],
            'account_no'=>$validate['account_no'],
            'bank_address'=>$validate['bank_address'],
            'generated_by'=>$validate['generated_by'],
            'status'=>$validate['status']
        ]);
        // dd($invoice->id);
        $descriptions = $request->item_desc;
        $quantities = $request->item_qty;
        $rates = $request->item_rate;
        $amounts = $request->item_amount;
        foreach ($descriptions as $index => $desc) {
            InvoiceItemModel::create([
                'invoice_id' => $invoice->id,
                'description' => $desc,
                'quantity' => $quantities[$index],
                'rate' => $rates[$index],
                'total' => $amounts[$index],
            ]);
        }
        if(true)
        {
            return redirect()->route('invoice')->with('success', 'Invoice and items added successfully!');
        }
        else
        {
            return redirect()->route('invoice')->with('success','Invoice creation falied');
        }

    }
}
