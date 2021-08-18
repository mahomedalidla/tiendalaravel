@extends('layouts.app')

@section('title', 'Lista de Productos - Nombre tienda')
@section('body-class','product-page')
@section('content')
    <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">

    </div>

    <div class="main main-raised">
        <div class="container">

        <div class="section text-center">
            <h2 class="title">Lista de Productos</h2>

            <div class="team">
                <a href=" {{ url('/admin/products/create') }} " class="btn btn-info btn-round">Nuevo Producto</a>
                <div class="row">

                    <table class="table">
                        <!-- Cabecera tabla -->
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="col-md-2 text-center">Nombre</th>
                                <th class="col-md-5 text-center">Descripción</th>
                                <th class="text-center">Categoría</th>
                                <th class="text-right">Precio</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>

                        @foreach ($products as $product)
                        <tbody>
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td> {{ $product->name }} </td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category_name}}</td>
                                <td class="text-right">$ {{ $product->price }} </td>
                                <td class="td-actions text-right">
                                    

                                    <form method="post" action="{{ url('/admin/products/'.$product->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        
                                        <a href="{{ url('/products/'.$product->id) }}" type="button" rel="tooltip" target="_blank" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
                                        </a>
                                        <a href="{{ url('/admin/products/'.$product->id.'/edit') }}" rel="tooltip" title="Editar Producto" class="btn btn-success btn-simple btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ url('/admin/products/'.$product->id.'/images') }}" type="button" rel="tooltip" title="Imagenes del Producto" class="btn btn-warning btn-simple btn-xs">
                                        <i class="fa fa-image"></i>
                                        </a>

                                        <button type="submit" rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
            </div>

        </div>

        </div>

    </div>

@include('includes.footer')
@endsection
