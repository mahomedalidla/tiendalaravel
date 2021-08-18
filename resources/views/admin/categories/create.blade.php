@extends('layouts.app')

@section('title', 'Registro producto - Nombre Tienda')
@section('body-class','product-page')
@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            
</div>

    <div class="main main-raised">
        <div class="container">

            <div class="section ">
                <h2 class="title text-center">Registrar una nueva categoría</h2>

                <!-- Alertas de errores -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- end -->

               <form method="post" action="{{ ('/admin/categories') }}" enctype="multipart/form-data">
                   {{ csrf_field() }}

                <div class="row">
                   <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la categoría</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                            <label class="control-label">Imagen de la categoría</label>
                            <input type="file" name="image">
                    </div>
                </div>

                    <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{ old('description') }}</textarea>

                    <button class="btn btn-success">Registrar nueva categoría</button>
                    <a href="{{ url('/admin/categories') }}" class="btn btn-danger">Cancelar</a>

               </form>

            </div>

        </div>

    </div>

@include('includes.footer')
@endsection
