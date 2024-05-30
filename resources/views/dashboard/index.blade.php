@extends('layouts.master')

@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Halaman Admin</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <x-card>
                <canvas id="lineChart" width="800" height="400"></canvas>
            </x-card>
        </div>
    </div>
@endsection

@push('scripts_vendor')
    <script src="{{ asset('/adminlte/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/moment/moment.min.js') }}"></script>
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('lineChart').getContext('2d');
            var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Data Monitoring',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    animation: {
                        duration: 1000, // Durasi animasi dalam milidetik
                        easing: 'linear' // Gaya animasi (linear untuk gerakan halus)
                    },
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                parser: function(value) {
                                    // Ubah format waktu ke Asia/Jakarta
                                    return moment(value, 'DD-MM-YYYY HH:mm:ss').tz('Asia/Jakarta')
                                        .format('HH:mm:ss');
                                },
                                unit: 'second',
                                displayFormats: {
                                    second: 'HH:mm:ss'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Mengambil data dari database setiap detik
            setInterval(function() {
                $.ajax({
                    url: '{{ route('grafik.data') }}',
                    type: 'GET',
                    success: function(response) {
                        console.log(response)
                        lineChart.data.labels = response.map(function(data) {
                            return data.tanggal;
                        });
                        lineChart.data.datasets[0].data = response.map(function(data) {
                            return data.kapasitas;
                        });

                        lineChart.update();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }, 1000); // Update setiap 1 detik
        });
    </script>
@endpush


{{--
@push('scripts')
    <script>
        $(document).ready(function() {
            var ctx = document.getElementById('lineChart').getContext('2d');
            var lineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: 'Data Monitoring',
                        data: [],
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                unit: 'second',
                                displayFormats: {
                                    second: 'HH:mm:ss'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            // Simulasi data terbaru setiap detik (gantilah ini dengan logika aktual Anda)
            setInterval(function() {
                var now = new Date();
                var dataPoint = {
                    x: now,
                    y: Math.random() * 100 // Contoh data acak
                };

                // Tambahkan data baru ke grafik
                lineChart.data.labels.push(now.toLocaleTimeString());
                lineChart.data.datasets[0].data.push(dataPoint);

                // Batasi jumlah data yang ditampilkan agar tidak terlalu banyak
                if (lineChart.data.labels.length > 10) {
                    lineChart.data.labels.shift();
                    lineChart.data.datasets[0].data.shift();
                }

                lineChart.update(); // Perbarui grafik
            }, 1000); // Update setiap 1 detik (gantilah ini sesuai kebutuhan)
        });
    </script>
@endpush  --}}
