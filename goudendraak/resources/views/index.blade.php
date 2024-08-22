@extends('layouts.main')
@section('content')
    <tr class="tr5">
        <td class="td15">    
        </td>
        <td class="td16"> <br>
            <h3>@lang('public.Intro')<br>
            @lang('public.Intro2')</h3>
            <br>
            <h2><u>@lang('public.Speciale Studentenaanbieding')</u></h2>
            <h1>@lang('public.Chinese Rijsttafel (2 personen)')</h1>
            <h3>
                @lang('public.Keuze uit drie van de onderstaande gerechten:')<br><br>
                <table class="table4">
                    <tr>
                        <td class="tr7">
                            @lang('public.Koe Loe Yuk')
                        </td>
                        <td class="td19">
                        </td>
                        <td class="td20">
                            @lang('public.Foe Yong Hai')
                        </td>
                    </tr>
                    <tr>
                        <td class="td21">
                            @lang('public.Tjap Tjoy')
                        </td>
                        <td>
                        </td>
                        <td>
                            @lang('public.Garnalen met Gebakken Knoflook')
                        </td>
                    </tr>
                    <tr>
                        <td class="td21">
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
        <td class="td15">    
        </td>
    </tr>
@endsection
