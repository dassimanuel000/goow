@extends('layouts.email')

@section('content')
    <tr>
        <td style="text-align: center;">
            <table style="width: 100%">
                <tr>
                    <th width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #9F9291;">Email: </p></th>
                    <td width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #000;">{{ $user->email }}</p></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <br />
            <div style="width: 363px; height: 1px; left: 539px; top: 357px; background: #F4F4F4;"></div>
            <br />
            <br />
            <br />
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <p style="font-size: 22px; line-height: 29px; text-align: center; color: #000000;">
                Bonjour ! <br />
                Vous venez de créer votre compte <span style="color: #3b1099; font-weight: bold;">GOOW</span>, cliquez sur le lien ci-dessous pour le valider. <br />
                Vous n’êtes plus qu’à un clic de profiter de toutes les fonctionnalités de GOOW !
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <br />
        </td>
    </tr>
    <tr>
        <td style="text-align: center;">
            <a href="{{ $url }}" style="font-style: normal; font-weight: bold; font-size: 14px; line-height: 30px; text-align: center; color: #273C75; cursor: pointer; text-decoration: none;">
                Verifier mon adresse mail
            </a>
        </td>
    </tr>
    <tr>
        <td>
            <br />
        </td>
    </tr>
    <tr>
        <td style="text-align: left;">
            <p style="font-style: normal; font-weight: normal; font-size: 14px; line-height: 21px; text-align: center; color: #000000;">
                A bientôt sur <a href="https://goow.fr/" style="color: #3b1099; font-weight: bold; text-decoration: none">GOOW</a><br />
                L’équipe <span style="color: #3b1099; font-weight: bold;">GOOW</span><br />
                Pour toutes questions ou remarques : Hello@goow.fr
            </p>
        </td>
    </tr>
@endsection
