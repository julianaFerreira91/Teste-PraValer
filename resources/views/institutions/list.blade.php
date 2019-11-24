@extends('index')

@section('title', 'Institutions')

@section('content')

<div class="container">

    <div class="row">
        <h3>Listagem de Instituições</h3>
    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{ route('institutions.create') }}">
            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 
            Incluir Instituição
        </a>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CNJP</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($institutions as $institution)
                        <tr>
                            <td>{{ $institution->name }}</td>
                            <td>{{ $institution->cnpj }}</td>
                            <td>{{ $institution->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-"></div>
                                    <a class="btn btn-success" href="{{ url('/institutions/' . $institution->id . '/edit') }}">
                                        Editar
                                    </a>
                                    <form class="form-inline" action="{{ url('/institutions/' . $institution->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection