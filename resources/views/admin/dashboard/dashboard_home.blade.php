@extends('admin.main')

@section('content')
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Dashboard
                    </div>
                    <h2 class="page-title">
                        Overview
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cols-1 row-cols-md-4">
                <!-- <div class="col mb-3">
        <div class="card h-100">
                      <div class="card-body">
                        <div class="row align-items-center">
                          <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                              <i class="fa fa-reply"></i>
                            </span>
                          </div>
                          <div class="col">
                            <div class="font-weight-medium h2 m-0">
                              8
                            </div>
                            <div class="text-muted">
                              Feedback
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
       </div> -->

                <div class="col mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info text-white avatar">
                                        <i class="fa fa-file-signature"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium h2 m-0">
                                        808
                                    </div>
                                    <div class="text-muted">
                                        Berita
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info text-white avatar">
                                        <i class="fa fa-file-alt"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium h2 m-0">
                                        576
                                    </div>
                                    <div class="text-muted">
                                        Pengumuman
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info text-white avatar">
                                        <i class="fa fa-file-alt"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium h2 m-0">
                                        576
                                    </div>
                                    <div class="text-muted">
                                        Artikel
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-info text-white avatar">
                                        <i class="fa fa-file-alt"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium h2 m-0">
                                        576
                                    </div>
                                    <div class="text-muted">
                                        Inforgrafis
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2">
            </div>

        </div>
        <div class="container-xl">
            <div class="card mb-3">
                <div class="card-header border-0 font-weight-bold">Grafik Pengunjung</div>
                <div class="card-body">
                    <div id="chart-pengunjung" style="height: 250px;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div class="text-muted">Pengunjung</div>
                                    <div class="h3">8.767</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-muted">Pengguna</div>
                                    <div class="h3">767</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-muted">Total Hits</div>
                                    <div class="h3">889</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-muted">Halaman/ Pengunjung</div>
                                    <div class="h3">7</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-muted">Durasi Pengunjung Rata-Rata</div>
                                    <div class="h3">00:05:01</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-muted">Pengguna Aktif 30 hari</div>
                                    <div class="h3">48</div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div class="text-muted">% Pengunjung Baru</div>
                                    <div class="h3">40</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="card-header border-0 font-weight-bold text-center">Returning vs New</div>
                        <div class="card-body">
                            <div id="chart-pie" style="height:250px;"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-muted">
                                Pengguna Aktif 1 hari
                            </div>
                            <div class="font-weight-medium h2 m-0">
                                32
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-muted">
                                Pengguna Aktif 7 hari
                            </div>
                            <div class="font-weight-medium h2 m-0">
                                67
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-muted">
                                Pengguna Aktif 14 hari
                            </div>
                            <div class="font-weight-medium h2 m-0">
                                400
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-muted">
                                Pengguna Aktif 30 hari
                            </div>
                            <div class="font-weight-medium h2 m-0">
                                210
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card h-100 flex-row align-items-center">
                        <div class="card-body text-center">
                            <div class="h4">Pengguna Online Saat Ini</div>
                            <div class="display-4">0</div>
                            <div class="text-muted">Pengguna Aktif di situs</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                    <div class="card h-100">
                        <div class="card-header border-0 font-weight-bold">Daftar Pengunjung Berdasarkan Kota</div>
                        <div class="table-responsive">
                            <table class="table card-table table-vcenter">
                                <thead>
                                    <tr>
                                        <th>Kota</th>
                                        <th>Pengunjung</th>
                                        <th>% Pengunjung</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Depok</td>
                                        <td>2.435</td>
                                        <td valign="middle">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Surabaya</td>
                                        <td>2.435</td>
                                        <td valign="middle">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jakarta</td>
                                        <td>2.435</td>
                                        <td valign="middle">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bandung</td>
                                        <td>2.435</td>
                                        <td valign="middle">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Yogyakarta</td>
                                        <td>2.435</td>
                                        <td valign="middle">
                                            <div class="progress">
                                                <div class="progress-bar" role="progressbar" style="width: 25%;"
                                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#navbar-menu > .navbar-nav > .nav-item > .nav-link > .nav-link-title:contains("Dashboard")').parents(
                '.nav-item').addClass('active');
        });
    </script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        Highcharts.chart('chart-pengunjung', {
            chart: {
                type: 'area'
            },
            title: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Jan 2021',
                    'Feb 2021',
                    'Mar 2021',
                    'Apr 2021',
                    'May 2021',
                    'Jun 2021',
                    'Jul 2021',
                    'Aug 2021',
                    'Sep 2021',
                    'Oct 2021',
                    'Nov 2021',
                    'Dec 2021'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                area: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Data',
                data: [100, 80, 90, 88, 101, 120, 130, 140, 120, 110, 130, 150]

            }]
        });

        Highcharts.chart('chart-pie', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Pengunjung',
                colorByPoint: true,
                data: [{
                    name: 'Returning Visitor',
                    y: 40
                }, {
                    name: 'New Visitor',
                    y: 60
                }]
            }]
        });
    </script>
@endsection
