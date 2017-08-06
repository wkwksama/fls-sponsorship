@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <a href="{{ route('users.create') }}">
                    <button type="button" class="btn btn-info btn-lg">Add User</button>
                </a>
                <div class="header">

                    <h4 class="title">User Pengguna</h4>
                    <p class="category">Sistem Sponsorship FLS 2017</p>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created at</th>
                        </thead>
                        <tbody>
                            @php $i = 0; @endphp
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->getRole() }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td class="text-center"><a href="/admin/users/{{ $user->id }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-flat"><i class="fa fa-user-times"></i> Hapus</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
