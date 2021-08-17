<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository  extends CoreRepository
{

    /**
     * @return string BlogCategoryRepository
     */
    protected function getModelClass() {
        return Model::class;
    }

    /**
     * Получение модели для редактирования
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit( int $id ) {

        //$collums = ['id', 'title', 'slug'];

        return $this->startConditions()->find($id);
    }

    /**
     *
     * Получить список для тега селект
     *
     * @return array|\Illuminate\Contracts\Foundation\Application[]|Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getForComboBox() {
        $collums = ['id', 'title'];

        $result = $this->startConditions()->select($collums)->toBase()->get();

       return $result;
    }

    public function getAllWithPaginate( $perPage = null ) {
        $collums = [
            'id',
            'title',
            'parent_id'
        ];
        return  $this->startConditions()->paginate($perPage, $collums);
    }
}