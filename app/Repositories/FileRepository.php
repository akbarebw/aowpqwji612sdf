<?php

namespace App\Repositories;

use App\Models\File;
use App\Repositories\BaseRepository;

class FileRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name_id',
        'name_en',
        'description_id',
        'description_en',
        'slug',
        'file_category_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return File::class;
    }
}
