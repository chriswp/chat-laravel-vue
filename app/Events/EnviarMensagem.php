<?php

namespace Chat\Events;


use Chat\Models\Mensagem;
use Chat\Models\User;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;


class EnviarMensagem implements ShouldBroadcast
{
    use SerializesModels;

    /** @var Mensagem */
    public $mensagem;

    /** @var User */
    public $user;

    /**
     * EnviarMensagem constructor.
     * @param Mensagem $mensagem
     */
    public function __construct(Mensagem $mensagem)
    {
        $this->mensagem = $mensagem;
        $this->user = auth()->user();
    }


    /**
     * @return array|PresenceChannel
     */
    public function broadcastOn()
    {
       return new PresenceChannel("chat.show.{$this->mensagem->chat_id}");
    }
}