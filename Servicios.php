<?php
class Servicios
{
    private int $id_servicios;
    private int $precio;
    private string $tipo;

    public function __construct(int $id_servicios, int $precio, string $tipo)
    {
        $this->id_servicios = $id_servicios;
        $this->precio = $precio;
        $this->tipo = $tipo;
    }
    public function getIdServicios(): int
    {
        return $this->id_servicios;
    }
    public function setIdServicios($id_servicios): int
    {
        return $this->id_servicios = $id_servicios;
    }
    public function getPrecio(): int
    {
        return $this->precio;
    }
    public function setPrecio($precio): int
    {
        return $this->precio = $precio;
    }
    public function getTipo(): string
    {
        return $this->tipo;
    }
    public function setTipo($tipo): string
    {
        return $this->tipo = $tipo;
    }
}
