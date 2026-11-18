<?php
require_once "Ordenes.php";
require_once "Clientes.php";
require_once "Servicios.php";
$servicios1 = new Servicios(1, 100, "reparacion");
$servicios2 = new Servicios(2, 150, "mantenimiento");
$servicios3 = new Servicios(3, 200, "inspection");
$ordenes1 = new Ordenes(1, "2024-11-18", "Pendiente", []);
$ordenes1->aumentarServicio($servicios1);
$ordenes1->aumentarServicio($servicios3);
$ordenes2 = new Ordenes(2, "2025-11-18", "Canceladas", []);
$ordenes2->aumentarServicio($servicios2);
$ordenes2->aumentarServicio($servicios3);
$ordenes3 = new Ordenes(3, "2026-11-18", "Completada", []);
$ordenes3->aumentarServicio($servicios1);
$ordenes3->aumentarServicio($servicios2);

$ordentes[] = $ordenes1;
$ordentes[] = $ordenes2;
$ordentes[] = $ordenes3;

$cliente1 = new Clientes(1, "Juan", []);
$cliente1->aumentarOrden($ordenes1);
$cliente1->aumentarOrden($ordenes3);
$cliente2 = new Clientes(2, "jessy", []);
$cliente2->aumentarOrden($ordenes2);
$cliente2->aumentarOrden($ordenes3);

// total de una orden
$total = $cliente1->getListaOrdenes();
var_dump("total de cada orden del cliente {$cliente1->getNombre()}\n");


function totalporden($total)
{
    foreach ($total as $orden) {
        $totalordenes = $orden->totalOrden();
    }
    return $totalordenes;
}

var_dump("-------------------------------------\n");

var_dump("total de la orden1");
var_dump($ordenes1->totalOrden());

var_dump("-------------------------------------\n");
var_dump("Resumen por estado de todos las ordenes\n");
var_dump(porestado($ordentes));
//Resumen por estado de todos las ordenes
var_dump(porestado($ordentes));
var_dump("-------------------------------------\n");
var_dump("Resumen por el cliente 1\n");
// por usuario
var_dump(porestado($cliente1->getListaOrdenes()));

function porestado($ordentes)
{
    $pendientes = array_filter($ordentes, function ($orden) {
        if ($orden->getEstado() === "Pendiente") {
            return $orden;
        }
    });
    $completadas = array_filter($ordentes, function ($orden) {
        if ($orden->getEstado() === "Completada") {
            return $orden;
        }
    });
    $cancelada = array_filter($ordentes, function ($orden) {
        if ($orden->getEstado() === "Canceladas") {
            return $orden;
        }
    });
    $totalpendientes = 0;
    foreach ($pendientes as $pendiente) {
        $totalpendientes += $pendiente->totalOrden();
    }

    $total['pendientes'] = ['cant' => count($pendientes), 'total' => $totalpendientes];

    $totalcompletada = 0;
    foreach ($completadas as $pendiente) {
        $totalcompletada += $pendiente->totalOrden();
    }

    $total['completadas'] = ['cant' => count($completadas), 'total' => $totalcompletada];

    $totalcancelada = 0;
    foreach ($cancelada as $pendiente) {
        $totalcancelada += $pendiente->totalOrden();
    }

    $total['canceladas'] = ['cant' => count($cancelada), 'total' => $totalcancelada];
    return $total;
}
