@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}">Produtos</a></li>
    </ol>
    <h1>Produtos <a href="{{ route('products.create') }}" class="btn btn-dark ml-3"><i class="fas fa-plus-square"></i></i>&nbsp;&nbsp;ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i>&nbsp;&nbsp;Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="max-width: 90px">Imagem</th>
                        <th>Título</th>
                        <th width='150'>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>
                                 <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 90px">
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">EDIT</a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">VER</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {{ $products->appends($filters)->links() }}
            @else
                {{ $products->links() }}
            @endif 
        </div>
    </div>
@stop