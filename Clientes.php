<?php
class Clientes
{
    private int $id_client;
    private string $nombre;
    private array $lista_ordenes = [];
    public function __construct(int $id_client, string $nombre, array $lista_ordenes)
    {
        $this->id_client = $id_client;
        $this->nombre = $nombre;
        $this->lista_ordenes = $lista_ordenes;
    }
    public function getIdCliente(): int
    {
        return $this->id_client;
    }
    public function setIdCliente(int $id_client): int
    {
        return $this->id_client = $id_client;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function setNombre(string $nombre): string
    {
        return $this->nombre = $nombre;
    }
    public function getListaOrdenes(): array
    {
        return $this->lista_ordenes;
    }
    public function setListaOrdenes(array $lista_ordenes): array
    {
        return $this->lista_ordenes = $lista_ordenes;
    }
    public function aumentarOrden(Ordenes $ordenes): void
    {
        $this->lista_ordenes[] = $ordenes;
    }

    public function ordenesCompletadas(): array
    {
        return array_filter($this->lista_ordenes, fn($ordenes) => $ordenes->getEstado() === 'Completada');
    }
}
