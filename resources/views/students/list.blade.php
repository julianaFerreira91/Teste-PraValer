@extends('index')

@section('title', 'Alunos')

@section('content')

<div class="container">

    <div class="row">
        <h3>Listagem de Alunos</h3>
    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{ route('students.create') }}">
            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 
            Incluir Aluno
        </a>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->cpf }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <div class="row">
                                    <div class="btn-options">
                                        <a class="btn btn-success" href="{{ url('/students/' . $student->id . '/edit') }}">
                                            Editar
                                        </a>
                                        <form class="form-inline" action="{{ url('/students/' . $student->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {{ $students->links() }}
            </div>
        </div>
    </div>
</div>

@endsection