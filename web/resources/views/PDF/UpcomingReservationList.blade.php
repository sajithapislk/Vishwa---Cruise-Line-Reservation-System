@inject('carbon', 'Carbon\Carbon')
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booked List</title>
    <style>
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: left;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            text-align: right;
            padding-left: 80px;
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

        .invoice-box table tr.discount td:nth-child(3) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .invoice-box table tr.sub-total td:nth-child(3) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        .invoice-box table tr.total td:nth-child(n+3):nth-child(-n+5):not(:last-child) {
            border-top: 2px solid #eee;
            font-weight: bold;
            border-bottom: 5px solid #eee;
            border-bottom-style: double;
        }

        .invoice-box table tr.credit td:nth-child(3) {
            border-top: 2px solid rgb(253, 216, 216);
            font-weight: bold;
            border-bottom: 5px solid rgb(253, 216, 216);
            border-bottom-style: double;
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
                text-align: left;
            }
        }

        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box" style="font-family: 'iskpota'">
        <table>
            <tr>
                <td colspan="5">
                    <table>
                        <tr>
                            <td colspan="2" style="text-align: center;font-size: 30px;">Upcoming Reservation List</td>
                        </tr>
                        <tr>
                            <td style="margin-left: 10px; width: 50%;">
                                <!-- Additional info if needed -->
                            </td>
                            <td style="vertical-align: bottom">
                                Date Time &nbsp;&nbsp;&nbsp;&nbsp;:{{ $carbon::now() }}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left">ID</th>
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Ship ID</th>
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Dept ID</th>
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Product ID</th>
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Name</th>
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Tax</th>
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Depart At</th>
                <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Arrive At</th>
            </tr>
            @foreach ($list as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->s_id }}</td>
                    <td>{{ $row->dp_id }}</td>
                    <td>{{ $row->p_id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->tax }}</td>
                    <td>{{ $row->depart_at }}</td>
                    <td>{{ $row->arrive_at }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
