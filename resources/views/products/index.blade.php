@extends('layouts.app')

@section('content')
<div align="center">
    <h4>Challenges</h4>
</div>
    <div class="container">
        <ul>
            @foreach($invoices as $invoice)
                <li>
                    <div>
                        ID #{{ $invoice->id }}, TOTAL {{ $invoice->total }}
                        <ul>
                        @foreach($invoice->products as $product)
                            <li>
                                #{{ $product->id }}, NAME: {{ $product->name }}, QTY:{{ $product->quantity }}, PRICE: {{ $product->price }}
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <hr>
                </li>
            @endforeach 
            </ul>
        <hr>
        <h6>1. Obtener precio total de la factura</h6>
        <ul>
            @foreach($invoices1 as $invoice)
                <li>
                    <strong>TOTAL Invoice #{{ $invoice->id }}:</strong> {{ $invoice->totales }}
                </li>
            @endforeach 
        </ul>
        <hr>
        <h6>2. Obtener todos id de las facturas que tengan productos con cantidad mayor a 100.</h6>
        <ul>
            @foreach($invoices2 as $invoice)
                <li>Invoice #{{ $invoice->id }}</li>
            @endforeach 
        </ul>
        <hr>
        <h6>3. Obtener todos id de las facturas que tengan productos con cantidad mayor a 100.</h6>
        <ul>
            @foreach($invoices3 as $invoice)
                <li>Product: {{ $invoice->name }}</li>
            @endforeach 
        </ul> 
        <hr>
        <h6>4. Explícanos ¿qué es "Laravel Jetstream"? y ¿qué permite "Livewire" a los programadores?</h6>
        <p><b>Laravel Jetstream:</b> permite ofrecer una gran cantidad de opciones para crear aplicaciones con Laravel. Cuenta con muchas funciones, y entre las más importantes:
            Soporte de API.
            Autenticación de dos factores.
            Posibilidad de verificar mediante correo electrónico.
            Gestionar varios equipos.<br><br>

            <b>Livewire:</b> es un framework para el desarrollo con Laravel que ofrece la posibilidad de realizar componentes con programación Javascript avanzada, pero sin necesidad de escribir código del lado del cliente.
            Es excelente para todos los profesionales que se sienten poco confortables escribiendo código Javascript y para cualquier desarrollador que pretenda ahorrar un tiempo considerable a la hora de crear sitios que presentan una cuidada experiencia de usuario.</p>       
    </div>
@endsection