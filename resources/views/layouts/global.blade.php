<!DOCTYPE html>
<html land="ja">
<head>
@hasSection('title')
    <title>@yield('title') | {{ config('app.name') }}</title>
@else
    <title>{{ config('app.name') }}</title>
@endif
<meta charset="utf-8">
<meta name="description" content="多摩市駅より徒歩２分！安全予約制の個室サロン！ヘッドスパ付き">
<meta name="keywords" content="多摩センター,美容院,美容室,個室,ヘッドスパ">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="robots" content="noindex,nofollow,noarchive">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('/css/sp.css') }}">
<link href="https://fonts.googleapis.com/css?family=Abel|Jura|Raleway|Supermercado+One" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
function slideSwitch() {
    var $active = $('#slideshow img.active');
    if ( $active.length == 0 ) $active = $('#slideshow img:last');
    var $next =  $active.next().length ? $active.next()
        : $('#slideshow img:first');
    $active.addClass('last-active');
    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}
$(function() {
    setInterval( "slideSwitch()", 3000 );
});
</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
function slideSwitch() {
    var $active2 = $('#slideshow2 img.active2');
    if ( $active2.length == 0 ) $activ2e = $('#slideshow2 img:last');
    var $next =  $active2.next().length ? $active2.next()
        : $('#slideshow2 img:first');
    $active2.addClass('last-active2');
    $next.css({opacity: 0.0})
        .addClass('active2')
        .animate({opacity: 1.0}, 1000, function() {
            $active2.removeClass('active2 last-active2');
        });
}
$(function() {
    setInterval( "slideSwitch()", 3000 );
});
</script>
<link rel="stylesheet" href="{{ asset('/css/drawer.min.css') }}">
<script src="{{ asset('/js/jquery.min.js') }}"></script>
<script src="{{ asset('/js/iscroll.js') }}"></script>
<script src="{{ asset('/js/drawer.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".drawer").drawer();
        $('.drawer-nav li a').on('click', function() {
        $('.drawer').drawer('close');
        });
    });
</script>
</head>
<body class="drawer drawer--right">
    <header>
        <div class="header">
            <div class="hhh">
                <a href="{{ route('top') }}"><img src="/images/logo.png" alt="andi ロゴ"></a>
            </div>
            <div class="mmm">
                <nav class="g_nav">
                    <ul class="menu-b">
                        <li><a href="{{ route('top') }}"><img src="{{ asset('/images/menu-home.png') }}"></a></li>
                        <li><a href="{{ route('access') }}"><img src="{{ asset('/images/menu-access.png') }}"></a></li>
                        <li><a href="{{ route('stylist') }}"><img src="{{ asset('/images/menu-stylist.png') }}"></a></li>
                        <li><a href="{{ route('menu') }}"><img src="{{ asset('/images/menu-price.png') }}"></a></li>
                        <li><a href="{{ route('opinionInput') }}"><img src="{{ asset('/images/menu-contact.png') }}"></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    @yield('content')

    <footer>
        <!--PC用のフッター-->
        <div class="pc">
            <div class="footer-footer">
                <div class="f-left">
                    <h2>andi parivate hair salon</h2>
                    <p>〒206-0033</p>
                    <p>東京都多摩市落合1-6-2　サンライズ増田７B</p>
                    <p>TEL：042-319-6777</p>
                </div>
                <div class="f-right">
                    <table>
                        <tr>
                            <td>CLOSE</td>
                            <td>&nbsp;&nbsp;&nbsp;TUSEDAY</td>
                        </tr>
                        <tr>
                            <td class="op">OPEN</td>
                            <td class="op">&nbsp;&nbsp;&nbsp;9:30～22：00</td>
                        </tr>
                        <tr>
                            <td rowspan="3"></td>
                            <td>&nbsp;&nbsp;&nbsp;ストレートパーマ　17:00</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;パーマ／カラー 19:00</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;カット 20:00</td>
                        </tr>
                        <tr>
                            <td class="op">ApER</td>
                            <td class="op">&nbsp;&nbsp;&nbsp;30分ごとに+500</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!--スマホ用のフッター-->
        <div class="sp">
            <div class="footer-footer">
                <div class="f-right">
                    <table>
                        <tr>
                            <td colspan="2">
                                <h2>andi parivate hair salon</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>CLOSE</td>
                            <td>&nbsp;&nbsp;&nbsp;TUSEDAY</td>
                        </tr>
                        <tr>
                            <td class="op">OPEN</td>
                            <td class="op">&nbsp;&nbsp;&nbsp;9:30～22：00</td>
                        </tr>
                        <tr>
                            <td rowspan="3"></td>
                            <td>&nbsp;&nbsp;&nbsp;ストレートパーマ　17:00</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;パーマ／カラー 19:00</td>
                        </tr>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;カット 20:00</td>
                        </tr>
                        <tr>
                            <td class="op">ApER</td>
                            <td class="op">&nbsp;&nbsp;&nbsp;30分ごとに+500</td>
                        </tr>
                    </table>
                </div>
                <div class="f-left">
                    <p>〒206-0033<br>
                        東京都多摩市落合1-6-2　サンライズ増田７B<br>
                        andi parivate hair salon<br>
                        TEL：042-319-6777</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
