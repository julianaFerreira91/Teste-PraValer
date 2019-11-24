@extends('index')

@section('title', 'Institutions')

@section('content')

    <div class="container">
        <h3>Cadastro de Instituição</h3>

        @if(\Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{ \Session::get('message') }}
        </div> 
        @elseif(\Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{ \Session::get('error') }}
            </div>
        @endif

        <div class="panel panel-default">
            <div class="panel-body">
                <form action="{{ route('institutions.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input class="form-control" type="text" name="cnpj" id="cnpj" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="" disabled selected>Selecione</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div>
                            <a href="{{ route('institutions.index') }}" class="btn btn-default">Voltar</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <button class="btn btn-success pull-right" type="submit">
                            <i class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></i>
                            Salvar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection