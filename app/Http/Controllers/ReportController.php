<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ReportModel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\MailPortal;
use Illuminate\Support\Facades\Mail;


class ReportController extends Controller
{

    public function index(Request $request)
    {
        $query = ReportModel::query();
    
        if ($request->filled('user')) {
            $search = $request->user;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('reported_by', 'like', "%{$search}%");
            });
        }
    
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        if ($request->filled('start_date')) {
            $query->whereDate('date_of_rt', '>=', $request->start_date);
        }
    
        if ($request->filled('end_date')) {
            $query->whereDate('date_of_rt', '<=', $request->end_date);
        }
    
        $reportlist = $query->orderBy('date_of_rt', 'desc')->get();
    
        return view('reports', compact('reportlist'));
    }
    

    public function savereport(Request $request)
    {
        $validate = $request->validate([
            'report_title'=>'required',
            'report_type'=>'required',
            'clientname'=>'required',
            'clientaddress'=>'required',
            'jobname'=>'required',
            'jobno'=>'required',
            'reportno'=>'required',
            'dateofrt'=>'required',
            'description'=>'required',
            'status'=>'required',
            'reported_by'=>'required'
        ]);
        $report = ReportModel::create([
            'title'=>$validate['report_title'],
            'type'=>$validate['report_type'],
            'clientname'=>$validate['clientname'],
            'clientaddress'=>$validate['clientaddress'],
            'jobname'=>$validate['jobname'],
            'jobno'=>$validate['jobno'],
            'reportno'=>$validate['reportno'],
            'date_of_rt'=>$validate['dateofrt'],
            'description'=>$validate['description'],
            'status'=>$validate['status'],
            'reported_by'=>$validate['reported_by']
        ]);
        if($report)
        {
            return redirect()->route('reports')->with('success', 'Report added successfully!');
        }
        else
        {
            return redirect()->route('reports')->with('success','Report creation falied');
        }
    }

    public function downloadPdf($id)
    {
        $report = ReportModel::find($id);

        $pdf = Pdf::loadView('pdf.report', compact('report'));

        return $pdf->download('report_summary.pdf');
    }
    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $report = ReportModel::find($id);
    
            if (!$report) {
                return response()->json(['message' => 'Report not found.'], 404);
            }
    
            try {
                $report->delete();
    
                return response()->json(['message' => 'Report deleted successfully.']);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Failed to delete report.'], 500);
            }
        }
    
        return response()->json(['message' => 'Invalid request.'], 400);
    }

    public function sendEmail(Request $request)
    {

        // dd($request);
        $request->validate([
            'to_email' => 'required|email',
            'subject' => 'required',
            'content'=>'required'
        ]);

        $data = [
            'subject' => $request->subject,
            'body' => $request->content,
            'name'=>$request->to_name,
            'content'=>$request->content,
        ];

        Mail::to($request->to_email)->send(new MailPortal($data));
            // if ($request->hasFile('attachment')) {
            //     $message->attach($request->file('attachment')->getRealPath(), [
            //         'as' => $request->file('attachment')->getClientOriginalName(),
            //         'mime' => $request->file('attachment')->getMimeType(),
            //     ]);
            // }
        

       // return response()->json(['message' => 'Email sent successfully.']);
        return redirect()->route('reports')->with('success', 'Email sent successfully.');

    }
    public function getReport($id)
    {
        $report = ReportModel::findOrFail($id); 
        return response()->json($report);
    }
}
