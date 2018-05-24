@extends('layouts.modular')

@section('css')
    <script type="text/javascript" src="{{ asset('js/fusioncharts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/themes/fusioncharts.theme.fint.js') }}"></script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title"> Reports </p>
                    </div>
                </div>
                <div class="card-block">
                    <div class="col-md-6">
                        <div id="trainerTypePie"></div>
                    </div>

                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        FusionCharts.ready(function(){
            var fusioncharts = new FusionCharts({
            type: 'pie2d',
            renderAt: 'trainerTypePie',
            width: '100%',
            height: '450',
            dataFormat: 'json',
            dataSource: {
                "chart": {
                    "caption": "Trainer Types",
                    "subCaption": "Internal / External",
                    "numberPrefix": "",
                    "showPercentInTooltip": "0",
                    "decimals": "0",
                    "useDataPlotColorForLabels": "1",
                    //Theme
                    "theme": "fint"
                },
                "data": [{
                    "label": "Internal",
                    "value": "{{ $internal_count }}"
                }, {
                    "label": "External",
                    "value": "{{ $external_count }}"
                }]
            }
        }
        );
            fusioncharts.render();
            });
    </script>
    <script>
        $('#sidebar-item-trainer').addClass('open active');

        function GetURLParameter(sParam) {
            var sPageURL = window.location.search.substring(1);
            var sURLVariables = sPageURL.split('&');
            for (var i = 0; i < sURLVariables.length; i++)
            {
                var sParameterName = sURLVariables[i].split('=');
                if (sParameterName[0] == sParam)
                {
                    return sParameterName[1];
                }
            }
        }
    </script>
@endsection