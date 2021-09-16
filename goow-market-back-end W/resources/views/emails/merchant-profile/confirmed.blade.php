@extends('layouts.email')

@section('content')
<hr style="border-top: 4px dotted #3b1099;">
    <tr style="text-align: center">
        <td>
            <svg width="485" height="128" viewBox="0 0 485 128" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0)">
                    <path d="M199.368 0C165.08 0 137.153 28.7282 137.153 64C137.153 99.2718 165.08 128 199.368 128V0Z" fill="#FEB42B"/>
                    <path d="M198.592 128C204.505 128 209.298 99.3462 209.298 64C209.298 28.6538 204.505 0 198.592 0C192.68 0 187.887 28.6538 187.887 64C187.887 99.3462 192.68 128 198.592 128Z" fill="#FB914E"/>
                    <path d="M262.049 128C296.338 128 324.265 99.2718 324.265 64C324.265 28.7282 296.338 0 262.049 0V128Z" fill="#1EC173"/>
                    <path d="M262.979 128C268.892 128 273.685 99.3462 273.685 64C273.685 28.6538 268.892 0 262.979 0C257.067 0 252.274 28.6538 252.274 64C252.274 99.3462 257.067 128 262.979 128Z" fill="#119352"/>
                    <path d="M219.848 123.053C225.761 123.053 230.554 96.6139 230.554 64.0001C230.554 31.3864 225.761 4.94775 219.848 4.94775C213.936 4.94775 209.143 31.3864 209.143 64.0001C209.143 96.6139 213.936 123.053 219.848 123.053Z" fill="#FF4583"/>
                    <path d="M241.259 123.053C247.171 123.053 251.964 96.6139 251.964 64.0001C251.964 31.3864 247.171 4.94775 241.259 4.94775C235.346 4.94775 230.553 31.3864 230.553 64.0001C230.553 96.6139 235.346 123.053 241.259 123.053Z" fill="#3B1099"/>
                    <path d="M122.724 55.7008H104.882V64.9576C104.882 89.6958 85.3327 109.806 61.2844 109.806C37.2361 109.806 17.6871 89.6958 17.6871 64.9576C17.6871 40.2195 37.2361 20.1097 61.2844 20.1097C72.6104 20.1097 83.4709 24.5786 91.5387 32.7182L97.8999 39.1023L110.312 25.8554L103.951 19.4713C92.6248 8.13965 77.42 1.75562 61.4395 1.75562C27.4616 1.75562 0 30.1646 0 64.9576C0 99.7506 27.4616 128.16 61.4395 128.16C95.4175 128.16 122.879 99.9102 122.879 64.9576L122.724 55.7008Z" fill="#565656"/>
                    <path d="M122.724 53.626H83.1606V71.9801H122.724V53.626Z" fill="#565656"/>
                    <path d="M468.399 4.14966L442.644 105.337L415.648 4.14966H399.047L431.008 123.85H454.435L485 4.14966H468.399Z" fill="#565656"/>
                    <path d="M398.426 4.14966L372.671 105.337L345.675 4.14966H329.074L361.035 123.85H384.463L415.027 4.14966H398.426Z" fill="#565656"/>
                </g>
                <defs>
                    <clipPath id="clip0">
                    <rect width="485" height="128" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <br/>
            <br/>
            <br/>
            <br/>
        </td>
    </tr>
    <tr style="text-align: center;">
        <td>
            <p style="font-size: 22px; line-height: 29px; text-align: center; color: #000000;">
                Bonjour.<br />
                Notre équipe est ravie de vous souhaiter la bienvenue sur <br/> <span style="color: #3b1099; font-weight: bold;">GOOW</span> !<br/><br/>
                Vous pouvez dès à présent compléter votre profil en vous connectant sur le lien suivant.
            </p>
            <br/>
        </td>
    </tr>
    <tr style="text-align: center;">
        <td>
            <a href="{{ $url }}" style="font-style: normal; font-weight: bold; font-size: 22px; line-height: 30px; text-align: center; color: #273C75; cursor: pointer; text-decoration: none;">
                > Accéder à votre stand <
            </a>
            <br/>
            <br/>
            <br/>
        </td>
    </tr>
    <tr style="text-align: center;">
        <td>
            <p style="font-size: 22px; line-height: 29px; color: #000000;">
                Vous pouvez vous aider de notre guide disponible <a href="https://goow.fr/files/guide.pdf" style="color: #3b1099; font-weight: bold;">ici</a> afin de compléter au mieux votre profil.
            </p>
            <br/>
            <br/>
        </td>
    </tr>
    <tr style="text-align: center;">
        <td>
            <p style="font-style: normal; font-weight: normal; font-size: 22px; line-height: 21px; text-align: center; color: #000000;">
                A bientôt sur <a href="https://goow.fr/" style="color: #3b1099; font-weight: bold; text-decoration: none">goow.fr</a><br>
                L’équipe <span style="color: #3b1099; font-weight: bold;">GOOW</span>
            </p>
            <br/>
            <br/>
            <br/>
        </td>
    </tr>
    <tr style="text-align: center;">
        <td>
            <a href="https://instagram.com/goowfr">
                <img src="https://goow.fr/images/instagram.svg" style="width: 35px; height: 35px"/>
            </a>          
            <a href="https://www.linkedin.com/company/goowfr/">
                <img src="https://goow.fr/images/in.svg" style="width: 35px; height: 35px"/>                        
            </a> 
        </td>
    </tr>
<hr/>
@endsection
