<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{mix('/app-assets/css/app.css')}}" rel="stylesheet">  
    <style>
        
        .search-input.open .input{
            width: 180px !important;
        }
        .ui-autocomplete{
            z-index: 2000;
        }
    </style>  
</head>
<body class="horizontal-layout 2-columns pace-done horizontal-menu menu-collapsed" data-open="click" data-menu="horizontal-menu" data-col="2-columns">

    <div id="app">
       <!-- BEGIN: Header-->
    @include('partials.header')
    <!-- END: Header-->
    <div class="app-content content">
        <div style="padding-top: 0" class="content-wrapper">
            <div class="content-header row mb-1">
            </div>
            <div style="padding-bottom: 3rem!important;" class="content-body">
                @yield('content')
               
        </div>
    </div>
        
    </div>
    <script src="{{mix('/app-assets/js/all.min.js')}}"></script>
    @stack('scripts')
    @stack('scriptsMenu')
    <script>
        //const tableFr = "{{ URL::asset('app-assets/languages/datatable-fr.json') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            var data = $.parseJSON($.ajax({
                url:  '/restaurant/getSearchRestaurants',
                dataType: "json", 
                async: false
            }).responseText);
            $(".ac-project").autocomplete({
                minLength: 0,
                source: data,
                focus: function(event, ui) {
                    $('[name="searchId"]')[0].value=ui.item.id;
                    $(".ac-project").val(ui.item.name);
                    return false;
                },
                select: function(event, ui) {
                    $('[name="searchId"]')[0].value=ui.item.id;
                    $(".ac-project").val(ui.item.name);
                    $('#form_search').submit();
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(ul, item) {
                return $("<li>")
                    .append("<div>" + item.name +"</div>")
                    .appendTo(ul);
            };
    </script>
</body>
</html>
