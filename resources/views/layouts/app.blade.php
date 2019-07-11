<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title'){{ config('app.name', 'Laravel') }}
    </title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"/>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75418628-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-75418628-3');
</script>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-1646080327489742",
        enable_page_level_ads: true
      });
    </script>
    <!-- Styles -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
</head>
<body>
<header>
    <div class="contents">
        <div class="title inline">
            <a href="{{route('contents.index')}}">
                昼寝王子のエンジニアブログ
            </a>
        </div>
        <div class="inline pc_search">
            <form action="{{ action('ContentsController@search') }}" method="GET">
                <input type="text" class="search_box" name="keyword" placeholder="例)Laravel"
                       value="">
            </form>
        </div>

        <div id="hamburger">
            <div id="line1"></div>
            <div id="line2"></div>
            <div id="line3"></div>
        </div>

        <nav class="nav_phone">
            <div class="inline">
                <form action="{{ action('ContentsController@search') }}" method="GET">
                    <input type="text" class="search_box" name="keyword" placeholder="例)データマイニング"
                           value="">
                </form>
            </div>
        </nav>
    </div>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-1646080327489742",
        enable_page_level_ads: true
      });
    </script>
</header>
@yield('content')
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
