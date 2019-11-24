@extends('index')

@section('title', 'Institutions')

@section('content')

    <div class="container">
        <h3>Atualizar Instituição</h3>

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
                <form action="{{ url('institutions/' .$institution->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $institution->name }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="cnpj">CNPJ</label>
                            <input class="form-control" type="text" name="cnpj" id="cnpj" value="{{ $institution->cnpj }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="1" {{ $institution->status == 1 ? 'selected' : '' }}>Ativo</option>
                                <option value="0" {{ $institution->status == 0 ? 'selected' : '' }}>Inativo</option>
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