<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function bookedList() {
        $list = Book::all();
        // return view('PDF.bookedList',compact('list'));
        $pdf = Pdf::loadview('pdf.bookedList', [
            'list' => $list
        ]);
        $orientation = 'landscape';
        $customPaper = array(0,0,950,950);
        $pdf->setPaper($customPaper, $orientation);
        return $pdf->stream();
    }
}
