<?php
include_once '../CONTROLLER/ChamadaCtrl.php';
include_once '../CONTROLLER/UtilCtrl.php';

UtilCtrl::VerTipoPermissao(1);

$ctrl = new ChamadaCtrl();
$dados = $ctrl->ResultadoGrafico();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include_once '_head.php';
        ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            include_once '_topo.php';
            include_once '_menu.php';
            ?>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            if (isset($ret)) {

                                ExibirMsg($ret);
                            }
                            ?>   
                            <h2>Página Inicial</h2>   
                        </div>
                    </div>

                    <hr />
                    <div id="grafico_inicial"></div>
                </div>

            </div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Element", "Density", {role: "style"}],
                    ["Aguardando atendimento",<?= $dados[0]['qtd_aguarde']?>, "#b83336"],
                    ["Em atendimento", <?= $dados[0]['qtd_atendimento']?>, "orange"],
                    ["Finalizado",<?= $dados[0]['qtd_finalizado']?>, "#00704a"],
                ]);

                var view = new google.visualization.DataView(data);
                view.setColumns([0, 1,
                    {calc: "stringify",
                        sourceColumn: 1,
                        type: "string",
                        role: "annotation"},
                    2]);

                var options = {
                    title: "Situação atual dos atendimentos",
                    width: 1050,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: {position: "none"},
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("grafico_inicial"));
                chart.draw(view, options);
            }
        </script>

    </body>
</html>