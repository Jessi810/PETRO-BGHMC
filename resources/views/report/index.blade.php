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
                    <div class="row">
                        <div class="col-md-6">
                            <div id="trainerTypePieChart"></div>
                        </div>
                        <div class="col-md-6">
                            <div id="trainer7DaysLineChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        FusionCharts.ready(function() {
            var trainerTypePieChart = new FusionCharts({
                type: 'pie2d',
                renderAt: 'trainerTypePieChart',
                width: '100%',
                height: '450',
                dataFormat: 'json',
                dataSource: {
                    "chart": {
                        "caption": "Trainer Types",
                        "subCaption": "Internal / External",
                        "paletteColors": "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
                        "bgColor": "#ffffff",
                        "showBorder": "1",
                        "use3DLighting": "0",
                        "showShadow": "0",
                        "enableSmartLabels": "0",
                        "startingAngle": "0",
                        "showPercentValues": "1",
                        "showPercentInTooltip": "0",
                        "decimals": "1",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "toolTipColor": "#ffffff",
                        "toolTipBorderThickness": "0",
                        "toolTipBgColor": "#000000",
                        "toolTipBgAlpha": "80",
                        "toolTipBorderRadius": "2",
                        "toolTipPadding": "5",
                        "showHoverEffect": "1",
                        "showLegend": "1",
                        "legendBgColor": "#ffffff",
                        "legendBorderAlpha": "0",
                        "legendShadow": "0",
                        "legendItemFontSize": "10",
                        "legendItemFontColor": "#666666",
                        "useDataPlotColorForLabels": "1",

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
            });
            trainerTypePieChart.render();

            $.ajax({
                url: "{{ route('report.trainer7days') }}",
                type: 'GET',
                success : function(data) {
                    chartData = data;
                    var chartProperties = {
                        "caption": "Number of Trainers Added",
                        "subCaption": "for the last 7 days",
                        "xAxisName": "Date",
                        "yAxisName": "Number of Trainers",
                        "lineThickness": "2",
                        "paletteColors": "#0075c2",
                        "baseFontColor": "#333333",
                        "baseFont": "Helvetica Neue,Arial",
                        "captionFontSize": "14",
                        "subcaptionFontSize": "14",
                        "subcaptionFontBold": "0",
                        "showBorder": "0",
                        "bgColor": "#ffffff",
                        "showShadow": "0",
                        "canvasBgColor": "#ffffff",
                        "canvasBorderAlpha": "0",
                        "divlineAlpha": "100",
                        "divlineColor": "#999999",
                        "divlineThickness": "1",
                        "divLineDashed": "1",
                        "divLineDashLen": "1",
                        "showXAxisLine": "1",
                        "xAxisLineThickness": "1",
                        "xAxisLineColor": "#999999",
                        "showAlternateHGridColor": "0",

                        "theme": "fint"
                    };
                    trainer7DaysLineChart = new FusionCharts({
                        type: 'line',
                        renderAt: 'trainer7DaysLineChart',
                        width: '100%',
                        height: '450',
                        dataFormat: 'json',
                        dataSource: {
                            "chart": chartProperties,
                            "data": chartData
                        }
                    });
                    
                    trainer7DaysLineChart.render();
                    console.log(chartData);
                }
            });

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