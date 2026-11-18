<?php
class Ordenes
{
    private int $id_orden;
    private string $fecha;
    private string $estado;
    private array $lista_servicios = [];

    public function __construct(int $id_orden, string $fecha, string $estado, array $lista_servicios)
    {
        $this->id_orden = $id_orden;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->lista_servicios = $lista_servicios;
    }

    public function getIdOrden(): int
    {
        return $this->id_orden;
    }
    public function setIdOrden($id_orden): int
    {
        return $this->id_orden = $id_orden;
    }
    public function getFecha(): string
    {
        return $this->fecha;
    }
    public function setFecha($fecha): string
    {
        return $this->fecha = $fecha;
    }
    public function getEstado(): string
    {
        return $this->estado;
    }
    public function setEstado($estado): string
    {
        return $this->estado = $estado;
    }
    public function getListaServicios(): array
    {
        return $this->lista_servicios;
    }
    public function setListaServicios($lista_servicios): array
    {
        return $this->lista_servicios = $lista_servicios;
    }
    public function aumentarServicio(Servicios $servicios): void
    {
        $this->lista_servicios[] = $servicios;
    }
    public function totalOrden(): int
    {
        $total = array_filter($this->lista_servicios, function ($servicios) {
            var_dump($servicios->getPrecio());
            return $servicios->getPrecio();
        });
        $totalsum = 0;
        foreach ($total as $t) {
            $totalsum = $totalsum + $t->getPrecio();;
        }
        return $totalsum;
    }
}
