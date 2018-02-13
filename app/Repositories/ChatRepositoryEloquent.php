<?php

namespace Chat\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Chat\Repositories\ChatRepository;
use Chat\Models\Chat;
use Chat\Validators\ChatValidator;

/**
 * Class ChatRepositoryEloquent.
 *
 * @package namespace Chat\Repositories;
 */
class ChatRepositoryEloquent extends BaseRepository implements ChatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Chat::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
