<?php

namespace Chat\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Chat\Repositories\MensagemRepository;
use Chat\Models\Mensagem;
use Chat\Validators\MensagemValidator;

/**
 * Class MensagemRepositoryEloquent.
 *
 * @package namespace Chat\Repositories;
 */
class MensagemRepositoryEloquent extends BaseRepository implements MensagemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Mensagem::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
