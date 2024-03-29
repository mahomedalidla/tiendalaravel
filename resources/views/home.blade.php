@extends('layouts.app')

@section('title', ' Perfil - Nombre Tienda')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
</div>

    <div class="main main-raised">
        <div class="container">

            <div class="section ">
                <h2 class="title text-center">Perfil</h2>

                <!-- notificacion -->
                @if (session('notification'))
                    <div class="alert alert-danger ">
                    {{ session('notification') }}
                    </div>
                @endif

                @if (session('notificationP'))
                    <div class="alert alert-success ">
                    {{ session('notificationP') }}
                    </div>
                @endif

                    <ul class="nav nav-pills nav-pills-primary" role="tablist">
                        <li class="active">
                            <a href="#dashboard" role="tab" data-toggle="tab">
                                <i class="material-icons">dashboard</i>
                                Carrito de compras
                            </a>
                        </li>
                        <li>
                            <a href="#tasks" role="tab" data-toggle="tab">
                                <i class="material-icons">list</i>
                                Pedidos Realizados
                            </a>
                        </li>
                    </ul>

                    <hr>
                    <p class="text-center"> Tu carrito de compras tiene {{ auth()->user()->cart->details->count() }} productos.</p>
                    <hr>
                    <table class="table">
                        <!-- Cabecera tabla -->
                        <thead>
                            <tr>
                                <th class="text-center">Imagen</th>
                                <th class="text-center">Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>

                        @foreach (auth()->user()->cart->details as $detail)
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img src="{{ $detail->product->featured_image_url }}" height="50">
                                </td>

                                <td>
                                 <a href="{{ url('/products/'.$detail->product->id) }}" class="text-center" target="_blank" > {{ $detail->product->name }} </a>
                                 </td>

                                <td>$ {{ $detail->product->price }} </td>
                                <td>{{ $detail->quantity }}</td>
                                <td>$ {{ $detail->quantity * $detail->product->price }}</td>

                                <td class="td-actions text-right">

                                    <form method="post" action="{{ url('/cart') }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="hidden" name="cart_detail_id" value="{{ $detail->id }}">

                                        <a href="{{ url('/products/'.$detail->product->id) }}" target="_blank" type="button" rel="tooltip" title="Ver Producto" class="btn btn-info btn-simple btn-xs">
                                        <i class="fa fa-info"></i>
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
                    <form method="post" action="{{ url('/order') }}">
                        {{ csrf_field() }}
                        <p><strong>Importe a pagar: </strong> {{ auth()->user()->cart->total }}</p>
                        <div class="text-center">
                            <button class="btn btn-success btn-round">
                                <i class="material-icons">add_shopping_cart</i>  Realizar pedido
                            </button>
                        </div>
                    </form>

                </div>
        </div>
    </div>

@include('includes.footer')
@endsection


