<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Golden Dragon</title>
    <style>
        body {
            background-color: darkred;
            margin: 15px 50px;
        }
        td {
            padding: 0;
        }
        @font-face {
            font-family: 'chinese_takeawayregular';
            src: url('{{ asset('fonts/chinesetakeaway-webfont.woff2') }}') format('woff2'),
                 url('{{ asset('fonts/chinesetakeaway-webfont.woff') }}') format('woff');
            font-weight: normal;
            font-style: normal;
        }
        a {
            text-decoration: none;
            color: yellow;            
        }
        .lang {
            text-decoration: none;
            color: yellow;
            font-size: 14px;
        }
        .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        .pagination li {
            margin: 0 5px;
        }
        .pagination a {
            color: yellow;
            text-decoration: none;
            padding: 8px 12px;
            border: 2px solid yellow;
            border-radius: 4px;
            background-color: red;
            font-family: 'chinese_takeawayregular';
            font-size: 16px;
        }
        .pagination a:hover {
            background-color: yellow;
            color: red;
        }
        .pagination .active a {
            background-color: yellow;
            color: red;
            border-color: yellow;
        }
        .pagination .disabled a {
            color: #ccc;
            pointer-events: none;
            border-color: #ddd;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: red;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 5px;
        }
        .dropdown-content a {
            color: yellow;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
            font-family: 'chinese_takeawayregular';
        }
        .dropdown-content a:hover {
            background-color: yellow;
            color: red;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown:hover .dropbtn {
            background-color: yellow;
            color: red;
        }
        .dropbtn {
            background-color: red;
            color: yellow;
            padding: 10px;
            font-size: 16px;
            font-family: 'chinese_takeawayregular';
            border: 2px solid yellow;
            cursor: pointer;
            border-radius: 5px;
        }
    </style>
</head>

<body>    
    <table id="main_table" style="padding:5px;width:100%;border-collapse: collapse">
        <tr style="height:50px;background-color:red"> 
            <td style="text-align:center;width:30%;color:yellow;font-size:30px">
                <img style="vertical-align: middle;" src="{{ asset('pictures/dragon-small.png') }}" alt="Golden Dragon" height="50px">
                <span style="font-family:'chinese_takeawayregular'">De Gouden Draak</span>
                <img style="vertical-align: middle;" src="{{ asset('pictures/dragon-small-flipped.png') }}" alt="Golden Dragon" height="50px">
            </td>
            <td>
                <a href="#" style="color:yellow;font-weight:bold;text-decoration: none;">
                    <marquee behavior="scroll" direction="left">
                    @lang('public.Welcome')
                    </marquee>
                </a>
            </td>
            <td style="text-align:center;width:30%;color:yellow;font-size:30px">                
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

    <table id="main_table" style="padding:5px;width:100%;border-collapse: collapse">
        <tr style="height:7px;background-color:red">
            <td colspan="9"></td>
        </tr>
        <tr style="height:25px;background-color:red">
            <td width="7px"></td>
            <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
            <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
            <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="border-top:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
            <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
            <td width="7px"></td>
        </tr>
        <tr style="height:25px;background-color:red">
            <td width="7px"></td>
            <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td width="7px"></td>
        </tr>
        <tr style="height:25px;background-color:red">
            <td width="7px"></td>
            <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px"></td>
            <td></td>
            <td style="width:25px"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px;border-bottom:4px solid yellow"></td>
            <td width="7px"></td>
        </tr>
        <tr style="height:50px;background-color:red"> 
            <td width="7px"></td>
            <td style="width:25px;border-right:4px solid yellow;border-left:4px solid yellow"></td>
            <td style="width:25px;"></td>
            <td style="width:25px;"></td>
            <td style="text-align:center">                
                <table width="100%">
                    <tr>
                        <td colspan="3">
                            <p>
                                <img src="{{ asset('pictures/dragon-small.png') }}" style="float:left;height:200px" alt="Golden Dragon"> 
                                <img src="{{ asset('pictures/dragon-small-flipped.png') }}" style="float:right;height:200px" alt="Golden Dragon"> 
                                <span style="font-size:40px;font-weight:bold;color:yellow">@lang('public.Chinees Indische Specialiteiten')</span><br>
                                <span style="font-size:50px;font-weight:bold;color:yellow">De Gouden Draak</span><br>
                            </p>
                            <p>
                                <table style="margin:auto;font-size:20px;color:white" border="1px solid white">
                                    <tr background="{{ asset('pictures/menu_bg_gradient.png') }}">
                                        <td valign="middle">
                                            <a href="{{ route('menukaart') }}" style="color:white">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('public.Menukaart')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                        <td valign="middle">
                                            <a href="{{ route('news') }}" style="color:white">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('public.Nieuws')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                        <td valign="middle">
                                            <a href="{{ route('contact') }}" style="color:white">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('public.Contact')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                        <td valign="middle">
                                            <a href="{{ route('paginas.menu') }}" style="color:white">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;@lang('public.Menu')&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </p>
                        </td>
                    </tr>
                    <tr style="padding-top:50px">
                        <td colspan="3" height="50px"></td>
                    </tr>       
                    <div class="content">
                        @yield('content')
                    </div>            
                </table>
            <br>
                <div text-align="center"><a href="{{ route('contact_new') }}">@lang('public.naar contact')</a></div>
            </td>
            <td style="width:25px;"></td>
            <td style="width:25px;"></td>
            <td style="width:25px;border-right:4px solid yellow;border-left:4px solid yellow"></td>
            <td width="7px"></td>
        </tr>
        <tr style="height:25px;background-color:red">
            <td width="7px"></td>
            <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px"></td>
            <td></td>
            <td style="width:25px"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px;border-top:4px solid yellow"></td>
            <td width="7px"></td>
        </tr>
        <tr style="height:25px;background-color:red">
            <td width="7px"></td>
            <td style="width:25px;border-left:4px solid yellow;border-top:4px solid yellow"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px;border:4px solid yellow"></td>
            <td style="width:25px;border-right:4px solid yellow;border-top:4px solid yellow"></td>
            <td width="7px"></td>
        </tr>
        <tr style="height:25px;background-color:red">
            <td width="7px"></td>
            <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="width:25px;border-right:4px solid yellow"></td>
            <td style="border-top:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="width:25px;border-left:4px solid yellow;"></td>
            <td style="width:25px;border-left:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td style="width:25px;border-right:4px solid yellow;border-bottom:4px solid yellow"></td>
            <td width="7px"></td>
        </tr>
        <tr style="height:7px;background-color:red">
            <td colspan="9"></td>
        </tr>
    </table>
</body>
</html>
