@extends('layouts.admin')

@section('title', 'Все пользователи')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Пользователи</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Имя</th>
                                    <th>Дата рождения</th>
                                    <th>Телефон</th>
                                    <th>E-mail</th>
                                    <th>Пароль</th>
                                    <th>Редактировать</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user){ ?>
                                <tr>
                                    <td><?= $user->name ?></td>
                                    <td><?= $user->birthdate ?></td>
                                    <td><?= $user->phone ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->password ?></td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user) }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Редактировать
                                        </a>
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                              style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                                <i class="fas fa-trash">
                                                </i>
                                                Удалить
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
