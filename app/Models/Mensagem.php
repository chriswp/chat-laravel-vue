<?php

namespace Chat\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Mensagem.
 *
 * @package namespace Chat\Models;
 */
class Mensagem extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'mensagens';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['mensagem', 'chat_id'];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

}
