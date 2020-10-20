<div>
    @if(session()->has('alert-component-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {!! session()->get('alert-component-success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('message-danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Erro: </strong> {!! session()->get('message-danger') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(session()->has('message-success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Erro: </strong>{!! session()->get('message-success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
</div>