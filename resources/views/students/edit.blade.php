@extends('index')

@section('title', 'Alunos')

@section('content')

    <div class="container">
        <h3>Atualizar Dados do Aluno</h3>

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
                <form action="{{ url('students/' . $student->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ $student->name }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input class="form-control" type="text" name="cpf" id="cpf" value="{{ $student->cpf }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="birthdate">Data de Nascimento</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{ $student->birthdate }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ $student->email }}" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="cellphone">Celular</label>
                            <input type="text" name="cellphone" id="cellphone" class="form-control" value="{{ $student->cellphone }}" required>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $student->address }}" required>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="number">Número</label>
                            <input type="text" name="number" id="number" class="form-control" value="{{ $student->number }}" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label for="neighborhood">Bairro</label>
                            <input type="text" name="neighborhood" id="neighborhood" class="form-control" value="{{ $student->neighborhood }}" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ $student->city }}" required>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="state">UF</label>
                            <input type="text" name="state" id="state" class="form-control" maxlength="2" value="{{ $student->state }}" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="" disabled selected>Selecione</option>
                                <option value="1" {{ $student->status == 1 ? 'selected' : '' }}>Ativo</option>
                                <option value="0" {{ $student->status == 0 ? 'selected' : '' }}>Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label for="course_id">Cursos</label>
                            <select name="course_id" id="course_id" class="form-control" required>
                                <option value="" disabled selected>Selecione</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}" 
                                    {{ $student->course_id == $course->id ? 'selected' : '' }}
                                    >{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                        <label for="insert-course">&nbsp;</label>
                            <a name="insert-course" href="{{ route('courses.create') }}" class="btn btn-default btn-sm form-control">Incluir Curso</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div>
                            <a href="{{ route('students.index') }}" class="btn btn-default">Voltar</a>
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