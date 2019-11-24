@extends('index')

@section('title', 'Cursos')

@section('content')

    <div class="container">
        <h3>Cadastro de Curso</h3>

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
                <form action="{{ route('courses.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="duration">Duração (anos)</label>
                            <input class="form-control" type="number" name="duration" id="duration" required>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="" disabled selected>Selecione</option>
                                <option value="1">Ativo</option>
                                <option value="0">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="institution_id">Instituição</label>
                            <select name="institution_id" id="institution_id" class="form-control" required>
                                <option value="" disabled selected>Selecione</option>
                                @foreach($institutions as $institution)
                                    <option value="{{ $institution->id }}">{{ $institution->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                        <label for="insert-institution">&nbsp;</label>
                            <a name="insert-institution" href="{{ route('institutions.create') }}" class="btn btn-default btn-sm form-control">Incluir Instituição</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div>
                            <a href="{{ route('courses.index') }}" class="btn btn-default">Voltar</a>
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