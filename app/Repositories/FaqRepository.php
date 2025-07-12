<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Repositories\BaseRepository;

class FaqRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'question',
        'question_en',
        'answer',
        'answer_en',
        'slug',
        'faq_category_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Faq::class;
    }
}
