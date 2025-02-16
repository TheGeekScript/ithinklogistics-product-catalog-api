<?php

namespace App\BO;

class ProductBO
{
    public int $id;
    public string $name;
    public ?string $description;
    public string $sku;
    public float $price;
    public int $category_id;
    public string $created_at;
    public string $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? 0;
        $this->name = $data['name'];
        $this->description = $data['description'] ?? null;
        $this->sku = $data['sku'];
        $this->price = (float) $data['price'];
        $this->category_id = (int) $data['category_id'];
        $this->created_at = $data['created_at'] ?? now()->toDateTimeString();
        $this->updated_at = $data['updated_at'] ?? now()->toDateTimeString();
    }
}
