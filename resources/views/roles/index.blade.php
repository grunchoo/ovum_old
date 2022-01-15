@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white"><ul class="nav nav-pills card-header-pills">
                    <li class="nav-item ">
                        <a class="nav-link nulled">Roles</a>
                    </li>
                    @can('roles.create')
                    <li class="nav-item">
                    <a href=" {{ route('roles.create') }}" class="nav-link active pull-right"><i class="fa fa-plus"></i> Nuevo </a>
                    </li>
                    @endcan
                    
                    </ul>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="ibox-content">
                                                       
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th class="project-title">Nombre</th>
                                            <th colspan="3">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{ $role->id }}</td>
                                            <td>{{ $role->name }}</td>
                                            <td width="10px">
                                                @can('roles.show')
                                                    <a href=" {{ route('roles.show', $role->id) }}" class="btn btn-primary btn-sm">V</a>
                                                @endcan
                                            </td>
                                            <td width="10px">
                                                @can('roles.edit')
                                                    <a href=" {{ route('roles.edit', $role->id) }}" class="btn btn-success btn-sm">E</a>
                                                @endcan
                                            </td>
                                            <td width="10px">
                                                @can('roles.destroy')
                                                {!! Form::open(['route' => ['roles.destroy', $role->id],
                                                'method' => 'DELETE']) !!}
                                                    <button class="btn btn-danger btn-sm">D</button>
                                                {!! Form::close() !!}
                                                    
                                                @endcan
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                                <div class="pagination justify-content-center">{{ $roles->render() }}</div>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
