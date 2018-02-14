@extends('layouts.app')

@section('content')
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
                            <input type="text" class="form-control input-md" v-model="mensagem"
                                   v-on:keyup.enter="enviarMensagem" placeholder="Digite sua mensagem"/>
                            <input type="hidden" name="chat_id" value="{{$chat->id}}">
                            <span class="input-group-btn">
                                <button class="btn btn-success btn-md" v-on:click="enviarMensagem">
                                    Enviar
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('pre-scripts')
    <script>
        var chatId = "{{ $chat->id }}";
    </script>
@endpush
