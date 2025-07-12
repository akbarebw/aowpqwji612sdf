<?php

namespace App\Repositories;

use App\Models\Galeri;
use App\Repositories\BaseRepository;

class GaleriRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'content',
        'users_created_id',
        'users_updated_id',
        'slug',
        'event_date'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Galeri::class;
    }
}
