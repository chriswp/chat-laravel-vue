@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Clientes em fila, selecione um chat abaixo:</div>

                    <div class="panel-body">
                        <ul class="list-group">
                            @foreach($chats as $chat)
                                <li class="list-group-item">
                                    <a href="{{ route('chat.show', ['id' => $chat->id])  }}">
                                        {{ $chat->chat  }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection