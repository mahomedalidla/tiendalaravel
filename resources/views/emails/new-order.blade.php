<!DOCTYPE html>
<html>
<head>
	<title>Nuevo pedido</title>
</head>
<body> 
	<p>Se realizo un nuevo pedido</p>
	<p>Estos son los datos del cliente que realizó el pedido</p>
	<ul>
		<li>
			<strong>Nombre:</strong>
			{{ $user->name }}
		</li>
		<li>
			<strong>E-mail:</strong>
			{{ $user->email }}
		</li>
		<li>
			<strong>Fecha del pedido:</strong>
			{{ $cart->order_date }}
		</li>
	</ul>
	<hr>
	<p>Detalles del pedido realizado por el cliente</p>
	<ul>
		@foreach ($cart->details as $detail)	
		<li>
			{{ $detail->product->name }} x {{ $detail->quantity }}
			($ {{ $detail->quantity * $detail->product->price }})
		</li>
		@endforeach
	</ul>
	<p>
		<strong>Importe que el cliente debe de pagar: </strong> {{ $cart->total }}
	</p>
	<hr>
	<p>
		<a href=" {{ url('/admin/orders/'.$cart->id) }}">Haz clic aquí</a>
		para poder ver mas información

	</p>
</body>
</html>