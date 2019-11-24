@extends('index')

@section('title', 'Cursos')

@section('content')

<div class="container">

    <div class="row">
        <h3>Listagem de Cursos</h3>
    </div>
    <div class="row">
        <a class="btn btn-primary" href="{{ route('courses.create') }}">
            <i class="glyphicon glyphicon-plus" aria-hidden="true"></i> 
            Incluir Cursos
        </a>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Duração</th>
                        <th>Status</th>
                        <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                            <td>{{ $course->duration }} anos</td>
                            <td>{{ $course->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                            <td>
                                <div class="row">
                                    <div class="btn-options">
                                        <a class="btn btn-success" href="{{ url('/courses/' . $course->id . '/edit') }}">
                                            Editar
                                        </a>
                                        <form class="form-inline" action="{{ url('/courses/' . $course->id) }}" method="POST">
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
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</div>

@endsection