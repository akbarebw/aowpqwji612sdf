<?php

namespace App\Repositories;

use App\Models\Agenda;
use App\Repositories\BaseRepository;

class AgendaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title',
        'content',
        'users_created_id',
        'users_updated_id',
        'slug',
        'schedule_date',
        'schedule_time',
        'pelaksana',
        'tipe_acara',
        'partisipasi',
        'location',
        'agenda_category_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Agenda::class;
    }
}
