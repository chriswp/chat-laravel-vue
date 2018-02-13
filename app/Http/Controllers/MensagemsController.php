<?php

namespace Chat\Http\Controllers;

use Illuminate\Http\Request;

use Chat\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Chat\Http\Requests\MensagemCreateRequest;
use Chat\Http\Requests\MensagemUpdateRequest;
use Chat\Repositories\MensagemRepository;
use Chat\Validators\MensagemValidator;

/**
 * Class MensagemsController.
 *
 * @package namespace Chat\Http\Controllers;
 */
class MensagemsController extends Controller
{
    /**
     * @var MensagemRepository
     */
    protected $repository;

    /**
     * @var MensagemValidator
     */
    protected $validator;

    /**
     * MensagemsController constructor.
     *
     * @param MensagemRepository $repository
     * @param MensagemValidator $validator
     */
    public function __construct(MensagemRepository $repository, MensagemValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $mensagems = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $mensagems,
            ]);
        }

        return view('mensagems.index', compact('mensagems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MensagemCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MensagemCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $mensagem = $this->repository->create($request->all());

            $response = [
                'message' => 'Mensagem created.',
                'data'    => $mensagem->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
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
        $mensagem = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $mensagem,
            ]);
        }

        return view('mensagems.show', compact('mensagem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mensagem = $this->repository->find($id);

        return view('mensagems.edit', compact('mensagem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MensagemUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MensagemUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $mensagem = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Mensagem updated.',
                'data'    => $mensagem->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Mensagem deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Mensagem deleted.');
    }
}
