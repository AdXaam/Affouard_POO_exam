<?php

class Moto{
    private $id;
    private $brand;
    private $model;
    private $type;
    private $image;


    public function __construct(int $id, string $brand, string $model, string $type, ?string $image)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->type = $type;
        $this->image = $image;
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getImage(): string
    {
        if (is_null($this->image)) {
            return "public/images/null.png";
        }
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
