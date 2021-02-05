<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\SaleDescription;
use App\InvoicePdf;
use PDF;
use Carbon\Carbon;
class InvoicePdfController extends Controller
{
    public function view_pdf(Request $request)
    {
        $data = Sale::all();
        $datas = $data->last();

        $datasDescriptions = SaleDescription::where('saleID', $datas->id)  ->get();
        return view('adminDashboard.pdfGenerator.invoicePdf',compact('datas','datasDescriptions'));
    }

  public function export_pdf()
  {
    // Fetch all customers from database
    $date = Carbon::now()->toDateTimeString();
    $datasDescriptions = SaleDescription::get();
    $data = Sell::all();

    $datas = $data->last();
    $datasDescriptions = SaleDescription::where('saleID', $datas->id)->get();

    // Send data to the view using loadView function of PDF facade
    $pdf = PDF::loadView('adminDashboard.pdfGenerator.invoicePdf', compact('datas','datasDescriptions') )
    ->save('./images/pdfs/'.$date.'invoice.pdf');
    // If you want to store the generated pdf to the server then you can use the store function
    // Finally, you can download the file using download function
    return $pdf->download('invoice.pdf');
  }
}
