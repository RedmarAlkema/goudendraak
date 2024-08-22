@extends('layouts.main')
@section('content')
    <tr style="padding-top:50px">
        <td width="50px">    
        </td>
        <td align="center" style='font-size:5;border:1px solid black;background:floralwhite'> <br>
            <h3>@lang('public.Intro')<br>
            @lang('public.Intro2')</h3>
            <br>
            <h2><u>@lang('public.Speciale Studentenaanbieding')</u></h2>
            <h1>@lang('public.Chinese Rijsttafel (2 personen)')</h1>
            <h3>
                @lang('public.Keuze uit drie van de onderstaande gerechten:')<br><br>
                <table width="60%">
                    <tr>
                        <td width="40%" style="text-align:right">
                            @lang('public.Koe Loe Yuk')
                        </td>
                        <td width="20%">
                        </td>
                        <td width="40%">
                            @lang('public.Foe Yong Hai')
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right">
                            @lang('public.Tjap Tjoy')
                        </td>
                        <td>
                        </td>
                        <td>
                            @lang('public.Garnalen met Gebakken Knoflook')
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right">
                            @lang('public.Babi Pangang')
                        </td>
                        <td>
                        </td>
                        <td>
                            @lang('public.Kipfilet in Zwarte Bonen saus')
                        </td>
                    </tr>
                </table>
                <br>
                @lang('public.Met witte rijst. (Nasi of bami voor meerprijs mogelijk.)')
            </h3>
            <h1>@lang('public.Prijs'): €21,00</h1>
        </td>
        <td width="50px">    
        </td>
    </tr>
@endsection
