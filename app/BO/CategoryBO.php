<?php

namespace App\BO;

class CategoryBO
{
    public int $id;
    public string $name;
    public ?int $parent_category_id;
    public string $created_at;
    public string $updated_at;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? 0;
        $this->name = $data['name'];
        $this->parent_category_id = $data['parent_category_id'] ?? null;
        $this->created_at = $data['created_at'] ?? now()->toDateTimeString();
        $this->updated_at = $data['updated_at'] ?? now()->toDateTimeString();
    }
}
