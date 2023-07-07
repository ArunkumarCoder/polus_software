<!DOCTYPE html>
<html>
<head>
    <title>Invoice Generate</title>
</head>
<style type="text/css">
    body{
        font-family: 'Roboto Condensed', sans-serif;
    }
    .m-0{
        margin: 0px;
    }
    .p-0{
        padding: 0px;
    }
    .pt-5{
        padding-top:5px;
    }
    .mt-10{
        margin-top:10px;
    }
    .text-center{
        text-align:center !important;
    }
    .w-100{
        width: 100%;
    }
    .w-50{
        width:50%;   
    }
    .w-85{
        width:85%;   
    }
    .w-15{
        width:15%;   
    }
    .logo img{
        width:200px;
        height:60px;        
    }
    .gray-color{
        color:#5D5D5D;
    }
    .text-bold{
        font-weight: bold;
    }
    .border{
        border:1px solid black;
    }
    table tr,th,td{
        border: 1px solid #d2d2d2;
        border-collapse:collapse;
        padding:7px 8px;
    }
    table tr th{
        background: #F4F4F4;
        font-size:15px;
    }
    table tr td{
        font-size:13px;
    }
    table{
        border-collapse:collapse;
    }
    .box-text p{
        line-height:10px;
    }
    .float-left{
        float:left;
    }
    .total-part{
        font-size:16px;
        line-height:12px;
    }
    .total-right p{
        padding-right:20px;
    }
</style>
<body>
<div class="head-title">
    <h1 class="text-center m-0 p-0">Invoice</h1>
</div>
<div class="add-detail mt-10">
    <div class="w-50 float-left mt-10">
        <p class="m-0 pt-5 text-bold w-100">Invoice Id - <span class="gray-color">#1</span></p>
        <p class="m-0 pt-5 text-bold w-100">Order Id - <span class="gray-color">AB123456A</span></p>
    </div>
    <div class="w-50 float-left logo mt-10">
        Test
    </div>
    <div style="clear: both;"></div>
</div>

<div class="table-section bill-tbl w-100 mt-10">
    <table class="table w-100 mt-10">
        <tr>
            <th class="w-50">Item Name</th>
            <th class="w-50">Quantity</th>
            <th class="w-50">Unit Price</th>
            <th class="w-50">Tax %</th>
        </tr>

        <tr>
            <td colspan="7">
                <div class="total-part">
                    <div class="total-left w-85 float-left" align="right">
                        <p>Sub Total without Tax</p>
                        <p>Sub Total with Tax</p>
                        <p>Discount Code</p>
                        <p>Discount Percentage</p>
                        <p>Sub Total with Tax after Discount</p>
                    </div>
                    <div class="total-right w-15 float-left text-bold" align="right">
                        <p>${{ $invoiceData['subtotal_without_tax'] }}</p>
                        <p>${{ $invoiceData['subtotal_with_tax'] }}</p>
                        <p>DISCOUNT10</p>
                        <p>10 %</p>
                        <p>${{ $invoiceData['subtotal_with_tax_after_discount'] }}</p>
                    </div>
                    <div style="clear: both;"></div>
                </div> 
            </td>
        </tr>
    </table>
</div>
</html>