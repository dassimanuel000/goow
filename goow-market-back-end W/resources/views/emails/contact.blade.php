@extends('layouts.email')

@section('content')
    <tr>
        <td style="text-align: center;">
            <table style="width: 100%">
                <tr>
                    <th width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #9F9291;">Email: </p></th>
                    <td width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #000;">{{ $data['email']  }}</p></td>
                </tr>
                <tr>
                    <th width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #9F9291;">First name: </p></th>
                    <td width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #000;">{{ $data['first_name']  }}</p></td>
                </tr>
                <tr>
                    <th width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #9F9291;">Last name: </p></th>
                    <td width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #000;">{{ $data['last_name']  }}</p></td>
                </tr>
                <tr>
                    <th width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #9F9291;">Phone: </p></th>
                    <td width="50%"><p style="font-style: normal; font-weight: normal; font-size: 16px; line-height: 27px; color: #000;">{{ $data['phone']  }}</p></td>
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
            <p style="font-size: 24px; line-height: 29px; text-align: center; color: #000000; font-weight: bold; ">
                {{ $data['subject'] }}
            </p>
            <p style="font-size: 22px; line-height: 29px; text-align: center; color: #000000;">
                {{ $data['message'] }}
            </p>
        </td>
    </tr>
    <tr>
        <td>
            <br />
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
