<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css') }}">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- JavaScript CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Polus Software</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Test</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid text-center">

        <form>
            <div class="row content">
                <div class="col-sm-2 sidenav">
                </div>
                <div class="col-sm-8 text-left">
                    <table class="table table-bordered" id="item_table">
                        <thead>
                            <tr>
                                <th>Item Name</th>
                                <th>Quantity</th>
                                <th>Unit Price in $</th>
                                <th>Tax Percentage</th>
                                <th>Total</th>
                                <th>Total Inc. Tax</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <tr id="R0">
                                <td><input type="text" class="form-control" id="item_name_0" name="item_name[]" value="" placeholder="Item Name"></td>
                                <td><input type="number" class="form-control" id="quantity_0" name="quantity[]" min="0" value="0" placeholder="Quantity"></td>
                                <td><input type="number" class="form-control" id="unit_price_0" name="unit_price[]" min="0" value="0" placeholder="Unit Price"></td>
                                <td>
                                    <select class="form-control" id="tax_percentage_0" name="tax_percentage[]">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                    </select>
                                </td>
                                <td>
                                    <div class="total_price">0</div>
                                </td>
                                <td>
                                    <div class="total_tax_price">0</div>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-sm btn-primary" id="addBtn" type="button">Add Row</button>
                </div>
                <div class="col-sm-2 sidenav">
                </div>
            </div>
            <br>
            <div class="row content">
                <div class="col-sm-2 sidenav">
                </div>
                <div class="col-sm-8 text-left">
                    <h5><b>Subtotal without Tax:</b></h5> <input type="text" class="form-control" id="subtotal_without_tax" name="subtotal_without_tax" readonly>
                    <p>Apply Discount Code "DISCOUNT10" for 10% discount:</p>
                    <input type="text" class="form-control" id="discount" name="discount" placeholder="Discount">
                    <button type="button" class="btn btn-sm btn-success" id="discount_apply_btn">Apply</button>
                    <h5><b>Subtotal with Tax:</b></h5> <input type="text" class="form-control" id="subtotal_with_tax" name="subtotal_with_tax" readonly>
                    <div id="subtotal_with_tax_after_discount_wrapper"></div>
                    <br>
                    <button type="button" class="btn btn-sm btn-info" id="generate_invoice">Generate Invoice</button>
                    <br><br>
                </div>
            </div>
        </form>

    </div>
    <footer class="container-fluid text-center"></footer>
    <!-- Custom script -->
    <script src="{{ asset('assets/js/custom-script.js') }}"></script>
</body>

</html>