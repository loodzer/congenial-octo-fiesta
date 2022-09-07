@extends('layouts.admin')

@section('title', 'Редактирование пользователя')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редактирование пользователя {{ $user->name }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i>{{ session('success') }}</h4>
                </div>
            @endif
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-primary">
                        <!-- form start -->
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Имя</label>
                                    <input type="text" value="{{ $user->name }}" name="name" class="form-control"
                                           id="exampleInputEmail1" placeholder="Введите имя" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Дата рождения</label>
                                    <input type="date" value="{{ $user->birthdate }}" name="birthdate"
                                           class="form-control"
                                           id="exampleInputEmail1" placeholder="Введите дату рождения" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Телефон</label>
                                    <input type="text" value="{{ $user->phone }}" name="phone"
                                           class="form-control"
                                           id="exampleInputEmail1" placeholder="Введите телефон" required
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">E-mail</label>
                                    <input type="text" value="{{ $user->email }}" name="email"
                                           class="form-control"
                                           id="exampleInputEmail1" placeholder="Введите email" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Пароль</label>
                                    <input type="password" value="{{ $user->password }}" name="password"
                                           class="form-control"
                                           id="exampleInputEmail1" placeholder="Введите пароль" required>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
