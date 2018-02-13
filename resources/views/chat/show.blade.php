@extends('layouts.app')

@section('content')
    <style type="text/css">
        .chat {
            padding: 0;
        }
        .chat li {
            margin-bottom: 10px;
            padding-bottom: 10px;
        }
        .chat li.left .chat-body {
            margin-left: 100px;
        }
        .chat li.right .chat-body {
            text-align: right;
            margin-right: 100px;
        }
        .card-block {
            overflow-y: scroll;
            height: 400px !important;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <h3>Atendentes Online</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#"></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">{{$chat->chat}}</div>

                    <div class="card-block">
                        <ul class="chat list-unstyled">
                            <li class="clearfix">
                                <span>
                                    <img class="img-circle"/>
                                </span>
                                <div class="chat-body">
                                    <strong></strong>
                                    <p></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" class="form-control input-md"
                                   placeholder="Digite sua mensagem"/>
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-md">Enviar</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
