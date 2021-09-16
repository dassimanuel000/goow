@extends('layouts.email')

@section('content')


<table cellpadding="0" cellspacing="0" border="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding: 0; margin: 0; width: 100%;">
    <tr>
        <td
                class="email-heading"
                style="
            font-family: Verdana, Arial;
            font-weight: normal;
            border-collapse: collapse;
            vertical-align: top;
            padding: 0 1%;
            margin: 0;
            background: #991012;
            border-right: 1px dashed #c3ced4;
            text-align: center;
            width: 58%;
        "
        >
            <h1 style="font-family: Verdana, Arial; font-weight: 700; font-size: 16px; margin: 1em 0; line-height: 20px; text-transform: uppercase; margin-top: 25px; color: #FFFFFF">Vous venez de recevoir une notification de la part de votre marché</h1>
            <p style="font-family: Verdana, Arial; font-weight: normal; line-height: 20px; margin: 1em 0; color: #FFFFFF">{{ $msg }}</p>
        </td>
    </tr>
    <tr>
        <td class="order-details" style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 5px 15px; margin: 0; text-align: center;">
            <h3 style="font-family: Verdana, Arial; font-weight: normal; font-size: 17px; margin-bottom: 10px; margin-top: 15px;"><span class="no-link"></span></h3>
            <p style="font-family: Verdana, Arial; font-weight: normal; font-size: 11px; margin: 1em 0 15px;">Mail envoyé depuis GOOW.fr par : {{ $marketTitle }}</p>
        </td>
    </tr>
</table>

@endsection
