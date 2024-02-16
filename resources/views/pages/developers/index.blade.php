@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-md-12">     
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mt-5" style="color: rgb(150, 95, 24);">
                <li class="breadcrumb-item"><a href="/" style="color: rgb(150, 95, 24);">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('developers.index') }}" style="color: rgb(150, 95, 24);">Desenvolvedor</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('projects.index') }}" style="color: rgb(150, 95, 24);">Projeto</a></li>
            </ol>
        </nav>
        <h2 class="mt-5 mb-5" style="color: rgb(150, 95, 24);">Desenvelvedor - {{ $developers->first()->name }} </h2>
        <div class="card">
            <div class="card-header" style="background-color: rgb(150, 95, 24);">
                <h4 class="mb-0 text-black">Desenvolvedores</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-lg">
                        <thead>
                            <tr>
                                <th scope="col" style="color: rgb(150, 95, 24);">Código</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Nome</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Email</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">github</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Tecnologias</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">level</th>
                                <th scope="col" style="color: rgb(150, 95, 24);">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($developers as $developer)
                            <tr>
                                <td>{{ $developer->id }}</td>
                                <td>{{ $developer->name }}</td>
                                <td>{{ $developer->email }}</td>
                                <td>{{ $developer->github }}</td>
                                <td>{{ $developer->technologies }}</td>
                                <td>{{ $developer->level }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('developers.edit', $developer->id) }}" class="btn btn-primary btn-sm square-btn"><i class="material-icons">edit</i></a>
                                        <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            @can('delete', $developer)
                                            <button type="submit" class="btn btn-danger btn-sm square-btn"><i class="material-icons">delete</i></button>
                                            @endcan   
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $developers->links() }}
                </div>
                <div class="mt-3">
                    <a href="{{ route('developers.create') }}" class="btn btn-secondary" style="background-color: rgb(150, 95, 24);">Create</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
