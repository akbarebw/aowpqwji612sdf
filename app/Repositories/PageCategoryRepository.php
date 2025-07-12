<?php

namespace App\Repositories;

use App\Models\PageCategory;
use App\Repositories\BaseRepository;

class PageCategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'keterangan',
        'custom_url',
        'parent_page_category_id',
        'slug',
        'external_url',
        'order'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return PageCategory::class;
    }
}
