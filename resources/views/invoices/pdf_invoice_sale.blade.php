


<html>
<head>
    <meta charset="utf-8" />
    <title>تحميل الفواتير</title>

    <style>
        body{
            font-family: 'XBRiyaz', sans-serif;
        }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'XBRiyaz', sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: right;
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
        .invoice-box.rtl {
            direction: rtl;
            font-family: 'XBRiyaz', sans-serif;
        }
        .invoice-box.rtl table {
            text-align: right;
        }
        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="3">
                <table>
                    <tr>
                        <td class="title">
                            <img src="http://localhost/github/erp-systems/public/assets/img/brand/logo.png" style="width: 100%; max-width: 300px   ;  margin-right: 222px;" />
                        </td>

                        <td colspan="1" >
                            رقم الفاتوره #: {{ $invoice_id}}<br />
                            تاريخ الفاتوره: {{ $invoice_date}}<br />

                        </td>


                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="3">
                <table>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>
                            اسم المورد<br />
                            {{ $clients_id}}<br />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading text-right">

            <td></td>

            <td></td>
            <td>تفاصيل الفاتوره</td>
        </tr>

        <tr class="details">
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr class="heading">
            <td>السعر</td>
            <td>العدد</td>
            <td>المنتج</td>

        </tr>
        @foreach($items as $item)
            <tr class="item">
                <td>{{ $item['product_name'] }}</td>
                <td>{{ $item['quantity'] }}</td>
                <td>{{ $item['row_sub_total'] }}</td>
            </tr>
        @endforeach


        <tr class="total">
            <td></td> <td></td>

            <td>الاجمالي: ${{ $total}}</td>
        </tr>
    </table>
</div>
</body>
</html>
