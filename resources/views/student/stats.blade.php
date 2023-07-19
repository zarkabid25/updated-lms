@extends('student.dashboard-layout')

@section('title', 'My Stats')
@section('css')
    <style>
        .MyStats_MyStatsMainBox__mmopD {
            height: -webkit-fit-content;
            height: -moz-fit-content;
            height: fit-content;
            width: 100%;
            padding: 1em
        }

        .MyStats_PageTitle__3A0Mu {
            font-size: 2em;
            font-weight: 700;
            z-index: 100;
            position: relative
        }

        .MyStats_Dashboard_Main_Grid__1ciVZ {
            height: 100%;
            width: 100%;
            display: grid;
            grid-gap: 1em;
            gap: 1em;
            grid-template-columns: repeat(3, minmax(200px, 1fr));
            grid-auto-rows: minmax(200px, 280px);
            z-index: 10
        }

        .MyStats_Dashboard_Panel__3Il3j {
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            width: 100%;
            background-color: #fff;
            padding: .8em;
            justify-content: center;
            box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #fff
        }

        .MyStats_Dashboard_Panel_2c__1-QVs {
            grid-column: span 2
        }

        .MyStats_Dashboard_Panel_2r__GuI4X {
            grid-row: span 2
        }

        .MyStats_Dashboard_Panel_3c__3gjIZ {
            grid-column: span 3
        }

        .MyStats_HeadingStats__33Z4U {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: row;
            align-items: flex-end;
            background-image: url(/images/DoodleBg2.8d87fcb3.svg);
            background-size: 100%
        }

        .MyStats_DoctorCoatImage__3PkgP {
            width: 8em
        }

        .MyStats_MyStatsHeading__1bhjv>h1 {
            text-align: center;
            font-size: 3em;
            margin-bottom: .5em
        }

        .MyStats_HeadingStats_Title__QO4PV {
            width: 100%;
            font-size: 2em
        }

        .MyStats_HeadingStats_Progress__1nsGZ {
            width: 96%
        }

        .MyStats_Speedometer_Panel__AhFJM {
            width: 100%
        }

        .MyStats_Speedometer_Title__23g3S {
            width: 100%;
            text-align: center;
            font-size: 1.2em
        }

        .MyStats_Stats_Number__178TJ {
            width: 100%;
            text-align: center;
            font-size: 4em;
            font-weight: 700
        }

        .MyStats_Stats_Title__2BDM2 {
            width: 100%;
            text-align: center;
            font-size: 1.2em;
            font-weight: 400
        }

        @media only screen and (max-width: 900px) {
            .MyStats_Dashboard_Main_Grid__1ciVZ {
                height: -webkit-fit-content;
                height: -moz-fit-content;
                height: fit-content;
                width: 100%;
                display: flex;
                flex-direction: column;
                grid-gap: 1em;
                gap: 1em;
                grid-template-columns: repeat(3, minmax(200px, 1fr));
                grid-auto-rows: minmax(200px, 500px)
            }

            .MyStats_Dashboard_Panel__3Il3j {
                min-height: 300px;
                height: 300px
            }

            .MyStats_HeadingStats_Title__QO4PV {
                width: 100%;
                font-size: 1.5em
            }

            .MyStats_HeadingStats_Panel__ZEKy_ {
                min-height: 200px;
                height: 200px
            }
        }

        @media only screen and (max-width: 1303px) {
            .MyStats_MyStatsHeading__1bhjv>h1 {
                font-size: 3em;
                margin-bottom: .4em
            }
        }

        @media only screen and (max-width: 900px) {
            .MyStats_MyStatsHeading__1bhjv>h1 {
                text-align: left;
                font-size: 3em;
                margin-bottom: .3em
            }

            .MyStats_HeadingStats_Panel__ZEKy_ {
                height: -webkit-fit-content;
                height: -moz-fit-content;
                height: fit-content
            }
        }

        @media only screen and (max-width: 726px) {
            .MyStats_MyStatsHeading__1bhjv>h1 {
                font-size: 2.5em;
                margin-bottom: .2em
            }
        }

        @media only screen and (max-width: 425px) {
            .MyStats_MyStatsHeading__1bhjv>h1 {
                font-size: 2.5em;
                margin-bottom: .2em;
                line-height: 1.1em
            }
        }

        .MyStats_Dashboard_Main_Grid__1ciVZ {
            height: 100%;
            width: 100%;
            display: grid;
            grid-gap: 1em;
            gap: 1em;
            grid-template-columns: repeat(3, minmax(200px, 1fr));
            grid-auto-rows: minmax(200px, 280px);
            z-index: 10;
        }

        canvas {
            -moz-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid pl_0" style="margin-bottom: 15%;">
        <div class="row" style="padding-bottom: 4%">
            <div class="MyStats_Dashboard_Main_Grid__1ciVZ">
                <div
                    class="MyStats_Dashboard_Panel_3c__3gjIZ MyStats_Dashboard_Panel__3Il3j MyStats_HeadingStats_Panel__ZEKy_">
                    <div class="MyStats_HeadingStats__33Z4U">
                        <div class="MyStats_HeadingStats_Title__QO4PV">
                            <div class="MyStats_MyStatsHeading__1bhjv">
                                <h1>My Stats</h1>
                            </div>You have attempted 30 out of 100 Questions on Lumiba<div
                                class="MyStats_HeadingStats_Progress__1nsGZ">
                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar"
                                        aria-valuenow="0.08768084173608066" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 30%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="MyStats_Dashboard_Panel__3Il3j MyStats_Dashboard_Panel_2r__GuI4X">
                    <div class="MyStats_Speedometer_Panel__AhFJM">
                        <div id="canvas-holder" style="width:100%">
                            <canvas id="chart"></canvas>
                        </div>
                        <div class="MyStats_Stats_Title__2BDM2">Percentage Questions Correct</div>
                    </div>
                </div>
                <div class="MyStats_Dashboard_Panel__3Il3j">
                    <div class="MyStats_Stats_Number__178TJ" style="color: rgb(25, 118, 210);"><span>30</span></div>
                    <div class="MyStats_Stats_Title__2BDM2">English Questions Attempted</div>
                </div>
                <div class="MyStats_Dashboard_Panel__3Il3j">
                    <div class="MyStats_Stats_Number__178TJ" style="color: rgb(22, 166, 29);"><span>0</span></div>
                    <div class="MyStats_Stats_Title__2BDM2">Biology Questions Attempted</div>
                </div>
                <div class="MyStats_Dashboard_Panel__3Il3j">
                    <div class="MyStats_Stats_Number__178TJ" style="color: rgb(255, 152, 0);"><span>0</span></div>
                    <div class="MyStats_Stats_Title__2BDM2">Chemistry Questions Attempted</div>
                </div>
                <div class="MyStats_Dashboard_Panel__3Il3j">
                    <div class="MyStats_Stats_Number__178TJ" style="color: rgb(106, 27, 154);"><span>0</span></div>
                    <div class="MyStats_Stats_Title__2BDM2">Physics Questions Attempted</div>
                </div>
                <div
                    class="MyStats_Dashboard_Panel__3Il3j MyStats_Dashboard_Panel_2c__1-QVs MyStats_Dashboard_Panel_2r__GuI4X">
                    <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                </div>
                <div class="MyStats_Dashboard_Panel__3Il3j">
                    <div class="MyStats_Stats_Number__178TJ" style="color: rgb(240, 12, 137);"><span>6.69s</span></div>
                    <div class="MyStats_Stats_Title__2BDM2">Avg Time per Question</div>
                </div>
                <div class="MyStats_Dashboard_Panel__3Il3j">
                    <div class="MyStats_Stats_Number__178TJ" style="color: rgb(76, 245, 214);"><span>30</span></div>
                    <div class="MyStats_Stats_Title__2BDM2">Total Attempts</div>
                </div>
            </div>
        </div>


    </div>


@endsection

@section('JS')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var xValues = ["English", "Chemistry", "Physics", "Bio", "Maths"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = ["red", "green", "blue", "orange", "brown"];

        new Chart("myChart", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: "Correct Percentage Of Subjects"
                },
            }
        });

        
    </script>
    <script src="https://unpkg.com/chart.js@2.8.0/dist/Chart.bundle.js"></script>
    <script src="https://unpkg.com/chartjs-gauge@0.3.0/dist/chartjs-gauge.js"></script>
    <script>

        var config = {
            type: 'gauge',
            data: {
                //labels: ['Success', 'Warning', 'Warning', 'Error'],
                datasets: [{
                    data: [25,50,75,100],
                    value: 33,
                    backgroundColor: ['green', 'yellow', 'orange', 'red'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    // text: 'Gauge chart'
                },
                layout: {
                    padding: {
                        bottom: 30
                    }
                },
                needle: {
                    // Needle circle radius as the percentage of the chart area width
                    radiusPercentage: 2,
                    // Needle width as the percentage of the chart area width
                    widthPercentage: 3.2,
                    // Needle length as the percentage of the interval between inner radius (0%) and outer radius (100%) of the arc
                    lengthPercentage: 40,
                    // The color of the needle
                    color: 'rgba(0, 0, 0, 1)'
                },
                valueLabel: {
                    formatter: Math.round
                }
            }
        };
        window.onload = function() {
            var ctx = document.getElementById('chart').getContext('2d');
            window.myGauge = new Chart(ctx, config);
        };

        document.getElementById('randomizeData').addEventListener('click', function() {
            config.data.datasets.forEach(function(dataset) {
                dataset.data = randomData();
                dataset.value = randomValue(dataset.data);
            });

            window.myGauge.update();
        });
    </script>
@endsection
