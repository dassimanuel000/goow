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
                Nous avons reçu une demande de renitialisation du mot de passe.
                <br />
                Cliquer sur le lien en dessous pour proceder à la modification de votre mot de passe.
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
                Modifier sont mot de passe
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
                GOOW
            </p>
        </td>
    </tr>
@endsection
