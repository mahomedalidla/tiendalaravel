@extends('layouts.app')

@section('title', 'Tienda - ' . config('app.name'))
@section('body-class','landing-page')
@section('styles')
    <style>
        .team .row .col-md-4 {
            margin-bottom: 5em;
        }

        .team .row {
          display: -webkit-box;
          display: -webkit-flex;
          display: -ms-flexbox;
          display:         flex;
          flex-wrap: wrap;
        }
        .team .row > [class*='col-'] {
          display: flex;
          flex-direction: column;
        }
/**/
        .tt-query {
      -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
         -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
              box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    }

    .tt-hint {
      color: #999
    }

    .tt-menu {    /* used to be tt-dropdown-menu in older versions */
      width: 170px;
      margin-top: 4px;
      padding: 4px 0;
      background-color: #fff;
      border: 1px solid #ccc;
      border: 1px solid rgba(0, 0, 0, 0.2);
      -webkit-border-radius: 4px;
         -moz-border-radius: 4px;
              border-radius: 4px;
      -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
         -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
              box-shadow: 0 5px 10px rgba(0,0,0,.2);
    }

    .tt-suggestion {
      padding: 3px 20px;
      line-height: 24px;
    }

    .tt-suggestion.tt-cursor,.tt-suggestion:hover {
      color: #fff;
      background-color: #0097cf;

    }

    .tt-suggestion p {
      margin: 0;
    }
    </style>
@endsection
@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenido a {{ config('app.name') }}</h1>
                        <h4>Aqui puede ir tu slogan, o alguna promoción  </h4>
                        <br />
                        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> Cómo comprar
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                

                <div class="section text-center">
                    <h2 class="title text-capitalize">Visita nuestras categorías</h2>

                    <!-- Busqueda-->
                    <form class="form-inline" method="get" action="{{ url('/search') }}">
                        <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query" id="search">
                        <button class="btn btn-primary btn-fab btn-fab-mini btn-round" type="submit">
                          <i class="material-icons">search</i>
                        </button>
                    </form>

                    <div class="team">
                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <a href="{{ url('/categories/'.$category->id) }}">
                                        <img src="{{ $category->featured_image_url }}" alt="Imagen Representativa de la categoría {{ $category->name }}" class="img-raised img-circle"> 
                                    </a>
                                    <h4 class="title">
                                     <a href="{{ url('/categories/'.$category->id) }}"> {{ $category->name }} </a>
                                    </h4>
                                    <p class="description"> {{ $category->description }} </p>
                                    
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>


                </div>


                <!-- -->
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title text-capitalize">¿Porque nosotros?</h2>
                            <h5 class="description">Puedes revisar todos nuestra extensa variedad de productos, podras darte cuenta que somos la mejor opcion y que tenemos una excelente calidad.</h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">Excelente Servicio al cliente</h4>
                                    <p>Atendemos rapidamente las dudas y posibles inconvenientes(aun que realmente será imposible tener uno con nosotros).</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Pago Seguro</h4>
                                    <p>Todos tus pagos seran extremadamente seguros, tus datos son encryptados desde que se hace la orden.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Información privada</h4>
                                    <p>Todos tus pedidos solo tu los conoceras, solamente tu tienes acceso a tu perfil de usuario.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!--  -->

<!--  

                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">Envia tus sugerencias</h2>
                            <h4 class="text-center description">Ponte en contacto con nosotros si tienes alguna recomendacion sobre el sitio, alguna sugerencia o bien alguna duda</h4>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tu Nombre</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tu Correo</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Tu Mensaje</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Enviar Mensaje
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                -->
                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center text-uppercase title">Crea tu cuenta en menos de un minuto!</h2>
                            <h4 class="text-center text-uppercase description">Unete y disfruta los beneficios</h4>
                            <br>
                            <ul class="text-center description">
                                
                                    <li>Comprar más rápido y seguro</li>

                                    <li>Guardar tus distintas direcciones</li>
                                        
                                    <li>Asegurar tus datos e información de pago</li>
                                        
                                    <li>Obtener beneficios exclusivos</li>
                                        
                                    <li>Pertenecer a nuestro programa de lealtad</li>
                                
                            </ul>
                            
                            <form class="contact-form"  method="POST" action="{{ route('register') }}">
                                    {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tu Nombre</label>
                                            <input type="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Tu Correo</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Registrarme
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

@include('includes.footer')
@endsection

@section('scripts')
    <script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script>

    <script>
        $(function () {
            //
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
              // `states` is an array of state names defined in "The Basics"
              prefetch: '{{ url("/products/json") }}'
            });

            // busqueda script
            $('#search').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                name: 'products',
                source: products
            });
        });
    </script>
@endsection