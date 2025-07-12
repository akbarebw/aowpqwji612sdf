<?php

namespace App\Repositories;

use App\Models\AgendaCategory;
use App\Repositories\BaseRepository;

class AgendaCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'description',
        'slug'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return AgendaCategory::class;
    }
}
