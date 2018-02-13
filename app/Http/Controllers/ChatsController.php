<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;

use Chat\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Chat\Http\Requests\ChatCreateRequest;
use Chat\Http\Requests\ChatUpdateRequest;
use Chat\Repositories\ChatRepository;
use Chat\Validators\ChatValidator;

/**
 * Class ChatsController.
 *
 * @package namespace Chat\Http\Controllers;
 */
class ChatsController extends Controller
{
    /**
     * @var ChatRepository
     */
    protected $repository;


    /**
     * ChatsController constructor.
     *
     * @param ChatRepository $repository
     */
    public function __construct(ChatRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = $this->repository->all();

        return view('chat.index', compact('chats'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chat = $this->repository->find($id);

        return view('chat.show', compact('chat'));
    }

}
