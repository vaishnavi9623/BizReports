<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReportModel;
use App\Models\InvoiceModel;
use App\Models\LedgerModel;
use App\Models\CompanyModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->input('type');
        $startdate = $request->input('start_date');
        $enddate = $request->input('end_date');

        $totalReport = ReportModel::count();
        $totalInvoice = InvoiceModel::count();
        // dd($totalInvoice);
        $totalLedgers= LedgerModel::count();
        $totalCompany= CompanyModel::count();

        if($type == 'Report'){
            $listOfReport = ReportModel::whereBetween('created_at',[$startdate,$enddate])->take('5')->get();
        }
        else{
        $listOfReport = ReportModel::orderBy('created_at','desc')->take('5')->get();
        }
        return view('dashboard',compact('totalReport','totalInvoice','totalLedgers','totalCompany','listOfReport'));
    }
}
