@extends('index')

@section('title', 'Alunos')

@section('content')

    <div class="container">
        <h3>Cadastro de Aluno</h3>

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
                <form action="{{ route('students.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="cpf">CPF</label>
                            <input class="form-control" type="text" name="cpf" id="cpf" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="birthdate">Data de Nascimento</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label for="cellphone">Celular</label>
                            <input type="text" name="cellphone" id="cellphone" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="form-group">
                            <label for="address">Endereço</label>
                            <input type="text" name="address" id="address" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="number">Número</label>
                            <input type="text" name="number" id="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label for="neightborhood">Bairro</label>
                            <input type="text" name="neightborhood" id="neightborhood" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="form-group">
                            <label for="city">Cidade</label>
                            <input type="text" name="city" id="city" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="form-group">
                            <label for="state">UF</label>
                            <input type="text" name="state" id="state" class="form-control" required>
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
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label for="course_id">Cursos</label>
                            <select name="course_id" id="course_id" class="form-control" required>
                                <option value="" disabled selected>Selecione</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
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