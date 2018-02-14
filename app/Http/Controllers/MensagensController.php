<?php

namespace Chat\Http\Controllers;

use Chat\Http\Requests\MensagemCreateRequest;
use Illuminate\Http\Request;
use Chat\Repositories\MensagemRepository;


/**
 * Class MensagemsController.
 *
 * @package namespace Chat\Http\Controllers;
 */
class MensagensController extends Controller
{
    /**
     * @var MensagemRepository
     */
    protected $repository;


    /**
     * MensagemsController constructor.
     *
     * @param MensagemRepository $repository
     */
    public function __construct(MensagemRepository $repository)
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
        $mensagems = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $mensagems,
            ]);
        }

        return view('mensagems.index', compact('mensagems'));
    }

    /**
     * @param MensagemCreateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMessage(MensagemCreateRequest $request)
    {
        $mensagem = $this->repository->create($request->all());

        if (request()->wantsJson()) {
            return response()->json($mensagem, 201);
        }

        return back();
    }
}
