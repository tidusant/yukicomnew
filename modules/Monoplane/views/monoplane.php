<?php extract($mp); ?>
<!DOCTYPE html>
<html lang="{{ $app('i18n')->locale }}">

    <head>

        <meta charset="utf-8" />
        <meta content='text/html; charset=utf-8' http-equiv='Content-Type'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>

        <title>{{ (!empty($page['title']) ? $page['title'] . ' - ' : '') . ($site['site_name'] ?? $app['app.name']) }}</title>
        <meta name="description" content="{{ $app->escape(!empty($page['description']) ? $page['description'] : ($site['description'] ?? '')) }}" />

        @render('views:partials/open-graph.php', compact('page', 'site'))

        <link rel="shortcut icon" href="{{ MP_BASE_URL }}/icon.ico?ver={{ $version }}">

        {{ $app->assets($app['monoplane.assets.top'], $version) }}
        {{ $app('mp')->userStyles() }}

    </head>

    <body id="top">

        <div id="wrapper-outer">
        <div id="wrapper-inner">
            <div id="inner">                
                <div id="banner-shadow" style="height:100px;"> </div>
                <div id="body">
                     @render('views:partials/nav.php', ['mp' => $mp, 'type' => 'main'])

                    {{ $content_for_layout }}
                    <div class="clear"> </div>
                </div>
                    



                @render('views:partials/copyright.php')
                <!-- end of footer -->
                <div class="clear"> </div>  
                
                @render('views:partials/header.php', ['mp' => $mp, 'type' => 'main'])
                
                <!-- end of header -->
            </div>
        </div>
        <!-- end of wrapper_inner -->
    </div>
    

    <div class="clear"> </div>








        {{ $app->assets($app['monoplane.assets.bottom'], $version) }}
        {{ $app('mp')->userScripts() }}

    </body>

</html>
