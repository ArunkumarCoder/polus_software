<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class InvoiceController extends Controller
{
    public function Invoice(Request $request)
    {
        $params = array();
        parse_str($request, $params);

        $discount = isset($params['discount']) && $params['discount'] != "" ? $params['discount'] : "-";
        $subtotal_with_tax_after_discount = isset($params['subtotal_with_tax_after_discount']) && $params['subtotal_with_tax_after_discount'] != "" ? $params['subtotal_with_tax_after_discount'] : "-";

        // $invoiceItems = [
        //     [
        //         'item' => $params['subtotal_without_tax']
        //     ],
        // ];

        $invoiceData = [
            'subtotal_without_tax' => $params['subtotal_without_tax'],
            'discount' => $discount,
            'subtotal_with_tax' => $params['subtotal_with_tax'],
            'subtotal_with_tax_after_discount' => $subtotal_with_tax_after_discount,
        ];

        $pdf = PDF::loadView('invoice_pdf', compact('invoiceData'));
        return $pdf->download('invoice.pdf');
    }
}
