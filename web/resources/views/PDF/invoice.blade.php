<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice</title>

    <style>
        .invoice-box {
            max-width: 800px;
            height: auto;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title" style="width: 60%">
                                <div
                                    style="text-align: center; margin: auto; line-height: 1.5; font-size: 14px; color: #4a4a4a;">

                                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('assets/icon.png'))) }}"style="width: 100px;" />

                                </div>
                            </td>
                            <td style="width: 40%; text-align: left;">
                                <h2>Invoice</h2>
                                ID: {{ $cruiseDeal->id }}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td style="width: 60%;">
                                <h5>Deal DETAILS</h5>
                                Customer Name : {{ $cruiseDeal->user->name }}<br>
                                Reservation Name : {{ $cruiseDeal->reservation->name }}<br>
                                Room Selected: {{ $cruiseDeal->booked_rooms }}

                            </td>

                            <td style="width: 50%; text-align: left;">
                                <h5>PAYMENT DETAILS</h5>
                                Transaction ID : {{ $cruiseDeal->payment->id }}<br>
                                Payment Method : {{ $cruiseDeal->payment->method }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="item">
                <td>
                    Amount
                </td>
                <td>
                    {{ $cruiseDeal->reservation->price }} USD
                </td>
            </tr>

            <tr class="item">
                <td>
                    TAX
                </td>
                <td>
                    {{ $cruiseDeal->reservation->tax }} USD
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Total
                </td>
                <td>
                    {{ $cruiseDeal->reservation->price+$cruiseDeal->reservation->tax }} USD
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
