@extends('admin.layouts.master')


@section('content')

    <script src="{{url('chart/chart.js')}}"></script>

    <div class="middle"><!-- start middle -->
        <h1 class="title-box">داشبورد</h1>



        <canvas id="myChart"></canvas>


        <div class="clear"></div>

        <div class="clear"></div>
    </div><!-- end middle -->


    <script>

        const labels = [
            '<?= $dateShamsi1 ?>',
            '<?= $tarikh2_shamsi ?>',
            '<?= $tarikh3_shamsi ?>',
            '<?= $tarikh4_shamsi ?>',
        ];

        const data = {
            labels: labels,
            datasets: [{
                label: 'فروش',
                backgroundColor: 'rgb(0,100,0)',
                borderColor: 'rgb(0,100,0)',
                data: [<?= $jamkol_1 ?>, <?= $jamkol_2 ?>, <?= $jamkol_3 ?>, <?= $jamkol_4 ?>],
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };


    </script>

    <script>
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>

    @endsection


