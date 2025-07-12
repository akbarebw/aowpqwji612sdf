<?php

namespace App\Repositories;

use App\Models\FileCategory;
use App\Repositories\BaseRepository;

class FileCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name_id',
        'name_en',
        'description_id',
        'description_en',
        'slug'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return FileCategory::class;
    }
}
