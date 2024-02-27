@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row row-gap-3">
            <div class="col-12 p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="">
                        <h1>POJECTS</h1>
                    </div>
                    <div class="">
                        <a class="btn btn-warning" href="{{ route('admin.project.create') }}">Add project</a>
                    </div>
                </div>
            </div>
            @foreach ($projects as $project)
                <div class="col-3">
                    <div class="card shadow h-100">
                        <img class="card-img-top p-3" src="{{ $project->img !== null ? asset('storage/'. $project->img) : 'https://cdn-icons-png.flaticon.com/512/3767/3767084.png' }}" alt="img project">
                        <div class="card-body">
                          <h5 class="card-title">{{ $project->name}}</h5>
                          <div class="text-secondary">Data Creazione: {{ $project->start_date }}</div>
                          <div class="text-secondary">Data Fine: {{ $project->end_date }}</div>
                          <div class="mt-2 d-flex gap-2">
                            <a href="{{ route('admin.project.show', ['project' => $project]) }}" class="btn btn-sm btn-primary">Visualizza</a>
                            <a href="{{ route('admin.project.edit', ['project'=>$project]) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.project.destroy', ['project'=>$project]) }}" method="post" onsubmit="return confirm('Sei sicuro di voler eliminare questo project')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Elimina</button>
                            </form>
                          </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection