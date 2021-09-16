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
            background: #3b1099;
            border-right: 1px dashed #c3ced4;
            text-align: center;
            width: 58%;
        "
        >
            <h1 style="font-family: Verdana, Arial; font-weight: 700; font-size: 16px; margin: 1em 0; line-height: 20px; text-transform: uppercase; margin-top: 25px; color: #FFFFFF">Une nouvelle commande et disponible dans votre espace marchand</h1>
            <p style="font-family: Verdana, Arial; font-weight: normal; line-height: 20px; margin: 1em 0; color: #FFFFFF"">Détails de la commande</p>
        </td>
    </tr>
    <tr>
        <td class="order-details" style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 5px 15px; margin: 0; text-align: center;">
            <h3 style="font-family: Verdana, Arial; font-weight: normal; font-size: 17px; margin-bottom: 10px; margin-top: 15px;">Numéro de commande<span class="no-link">#{{ $order->id }}</span></h3>
            <p style="font-family: Verdana, Arial; font-weight: normal; font-size: 11px; margin: 1em 0 15px;">Commande effectuée le {{ \Carbon\Carbon::parse($order->created_at)->format('m/d/Y H:m') }}</p>
        </td>
    </tr>
    <tr>
        <td class="order-details" style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 5px 15px; margin: 0; text-align: center;">
            <h3 style="font-family: Verdana, Arial; font-weight: normal; font-size: 17px; margin-bottom: 10px; margin-top: 15px;">Veuillez confirmer votre commande depuis votre espace marchands, ou en cliquant sur le bouton ci-dessous</h3>
            <a href="https://goow.fr/profile/orders" target="_blank" style="font-family: Verdana, Arial; background: rgba(85, 164, 32, 1); color: #fff; font-weight: bold; padding: 12px 30px; border-radius: 6px; margin: 10px 0; display: inline-block; text-decoration: none; font-size: 14px;">Mes commandes</a>
        </td>
    </tr>
    <tr class="order-information">
        <td style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 0; margin: 0;">
            <table cellpadding="0" cellspacing="0" border="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; padding: 0; margin: 0; width: 100%;">
                <tr>
                    <td class="method-info" style="font-family: Verdana, Arial; font-weight: normal; border-collapse: collapse; vertical-align: top; padding: 10px 15px 0; margin: 0; text-align: left; padding-bottom: 10px;">
                        <h6 style="font-family: Verdana, Arial; font-weight: 700; text-align: left; font-size: 12px; margin-bottom: 0px; margin-top: 5px; text-transform: uppercase;">Méthode de paiments: {{ $order->payment_method }}</h6>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

@endsection
