<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Golden Dragon</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>    
    <table id="main_table">
        <tr class="tr1"> 
            <td class="td1">
                <img class="img1" src="{{ asset('pictures/dragon-small.png') }}" alt="Golden Dragon">
                    <span class="spanText">De Gouden Draak</span>
                <img class="img1" src="{{ asset('pictures/dragon-small-flipped.png') }}" alt="Golden Dragon">
            </td>
            <td>
                <a href="#" class="movingText">
                    <marquee behavior="scroll" direction="left">
                    @lang('public.Welcome')
                    </marquee>
                </a>
            </td>
            <td class="td1">                
                <div class="dropdown">
                    <button class="dropbtn">                        
                        @lang('public.Taal')
                    </button>
                    <div class="dropdown-content">
                        <a class="lang" href="{{ route('localize', ['lange' => 'nl']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <path fill="#fff" d="M1 11H31V21H1z"></path>
                                <path d="M5,4H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z" fill="#a1292a"></path>
                                <path d="M5,20H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z" transform="rotate(180 16 24)" fill="#264387"></path>
                            </svg>
                            Nederlands
                        </a>
                        <a class="lang" href="{{ route('localize', ['lange' => 'en']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <rect x="1" y="4" width="30" height="24" rx="4" ry="4" fill="#071b65"></rect>
                                <path d="M5.101,4h-.101c-1.981,0-3.615,1.444-3.933,3.334L26.899,28h.101c1.981,0,3.615-1.444,3.933-3.334L5.101,4Z" fill="#fff"></path>
                                <path d="M22.25,19h-2.5l9.934,7.947c.387-.353,.704-.777,.929-1.257l-8.363-6.691Z" fill="#b92932"></path>
                                <path d="M1.387,6.309l8.363,6.691h2.5L2.316,5.053c-.387,.353-.704,.777-.929,1.257Z" fill="#b92932"></path>
                                <path d="M5,28h.101L30.933,7.334c-.318-1.891-1.952-3.334-3.933-3.334h-.101L1.067,24.666c.318,1.891,1.952,3.334,3.933,3.334Z" fill="#fff"></path>
                                <rect x="13" y="4" width="6" height="24" fill="#fff"></rect>
                                <rect x="1" y="13" width="30" height="6" fill="#fff"></rect>
                                <rect x="14" y="4" width="4" height="24" fill="#b92932"></rect>
                                <rect x="14" y="1" width="4" height="30" transform="translate(32) rotate(90)" fill="#b92932"></rect>
                                <path d="M28.222,4.21l-9.222,7.376v1.414h.75l9.943-7.94c-.419-.384-.918-.671-1.471-.85Z" fill="#b92932"></path>
                                <path d="M2.328,26.957c.414,.374,.904,.656,1.447,.832l9.225-7.38v-1.408h-.75L2.328,26.957Z" fill="#b92932"></path>
                                <path d="M27,4H5c-2.209,0-4,1.791-4,4V24c0,2.209,1.791,4,4,4H27c2.209,0,4-1.791,4-4V8c0-2.209-1.791-4-4-4Zm3,20c0,1.654-1.346,3-3,3H5c-1.654,0-3-1.346-3-3V8c0-1.654,1.346-3,3-3H27c1.654,0,3,1.346,3,3V24Z" opacity=".15"></path>
                                <path d="M27,5H5c-1.657,0-3,1.343-3,3v1c0-1.657,1.343-3,3-3H27c1.657,0,3,1.343,3,3v-1c0-1.657-1.343-3-3-3Z" fill="#fff" opacity=".2"></path>
                            </svg>
                            English
                        </a>
                        <a class="lang" href="{{ route('localize', ['lange' => 'de']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <path fill="#cc2b1d" d="M1 11H31V21H1z"></path>
                                <path d="M5,4H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z"></path>
                                <path d="M5,20H27c2.208,0,4,1.792,4,4v4H1v-4c0-2.208,1.792-4,4-4Z" transform="rotate(180 16 24)" fill="#f8d147"></path>
                            </svg>
                            Deutsch
                        </a>
                        <a class="lang" href="{{ route('localize', ['lange' => 'fr']) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <path fill="#fff" d="M10 4H22V28H10z"></path>
                                <path d="M5,4h6V28H5c-2.208,0-4-1.792-4-4V8c0-2.208,1.792-4,4-4Z" fill="#092050"></path>
                                <path d="M25,4h6V28h-6c-2.208,0-4-1.792-4-4V8c0-2.208,1.792-4,4-4Z" transform="rotate(180 26 16)" fill="#be2a2c"></path>
                            </svg>
                            Français
                        </a>
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table id="main_table">
        <tr class="tr2">
            <td colspan="9"></td>
        </tr>
        <tr class="tr3">
            <td class="small_td"></td>
            <td class="td2"></td>
            <td class="td3"></td>
            <td class="td4"></td>
            <td class="td5"></td>
            <td class="td6"></td>
            <td class="td2"></td>
            <td class="td3"></td>
            <td class="small_td"></td>
        </tr>
        <tr class="tr3">
            <td class="small_td"></td>
            <td class="td6"></td>
            <td class="td7"></td>
            <td class="td7"></td> 
            <td></td>
            <td class="td7"></td>
            <td class="td7"></td>
            <td class="td4"></td>
            <td class="small_td"></td>
        </tr>
        <tr class="tr3">
            <td class="small_td"></td>
            <td class="td4"></td>
            <td class="td7"></td>
            <td class="small_td2"></td>
            <td></td>
            <td class="small_td2"></td>
            <td class="td7"></td>
            <td class="td8"></td>
            <td class="small_td"></td>
        </tr>
        <tr class="tr1"> 
            <td class="small_td"></td>
            <td class="td9"></td>
            <td class="small_td2"></td>
            <td class="small_td2"></td>
            <td class="td10">                
                <table class="table1">
                    <tr>
                        <td colspan="3">
                            <p>
                                <img src="{{ asset('pictures/dragon-small.png') }}" class="img2" alt="Golden Dragon"> 
                                <img src="{{ asset('pictures/dragon-small-flipped.png') }}" class="img3" alt="Golden Dragon"> 
                                <span class="span1">@lang('public.Chinees Indische Specialiteiten')</span><br>
                                <span class="span2">De Gouden Draak</span><br>
                            </p>
                            <p>
                                <table class="table2">
                                    <tr class="tr6">
                                        <td class="tr4">
                                            <a href="{{ route('menukaart') }}" class="white">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('public.Menukaart')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                        <td class="tr4">
                                            <a href="{{ route('news') }}" class="white">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('public.Nieuws')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                        <td class="tr4">
                                            <a href="{{ route('contact') }}" class="white">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('public.Contact')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                        <td class="tr4">
                                            <a href="{{ route('paginas.menu') }}" class="white">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('public.Menu')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </p>
                        </td>
                    </tr>
                    <tr class="tr5">
                        <td class="td11" colspan="3"></td>
                    </tr>                   
                </table>
                {{ $slot }}
                <br>
                <div class="centerText"><a href="{{ route('contact_new') }}">@lang('public.naar contact')</a></div>
            </td>
            <td class="small_td2"></td>
            <td class="small_td2"></td>
            <td class="td9"></td>
            <td class="small_td"></td>
        </tr>
        <tr class="tr3">
            <td class="small_td"></td>
            <td class="td3"></td>
            <td class="td7"></td>
            <td class="small_td2"></td>
            <td></td>
            <td class="small_td2"></td>
            <td class="td7"></td>
            <td class="td12"></td>
            <td class="small_td"></td>
        </tr>
        <tr class="tr3">
            <td class="small_td"></td>
            <td class="td2"></td>
            <td class="td7"></td>
            <td class="td7"></td>
            <td></td>
            <td class="td7"></td>
            <td class="td7"></td>
            <td class="td3"></td>
            <td class="small_td"></td>
        </tr>
        <tr class="tr3">
            <td class="small_td"></td>
            <td class="td6"></td>
            <td class="td4"></td>
            <td class="td13"></td>
            <td class="td5"></td>
            <td class="td14"></td>
            <td class="td6"></td>
            <td class="td4"></td>
            <td class="small_td"></td>
        </tr>
        <tr class="tr2">
            <td colspan="9"></td>
        </tr>
    </table>
</body>
</html>