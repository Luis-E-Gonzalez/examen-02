<script>
    function cal() {
        try {
            var a = parseFloat(document.f.price.value),
                b = parseInt(document.f.quantity.value);
            document.f.total.value = a * b;
        } catch (e) {}
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen-02</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .form-select {
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="container">
    <br>
        <h1>Venta de productos</h1><hr>
        <form action="{{route('vender')}}" method="POST" enctype="multipart/form-data" name="f">
            {{csrf_field()}}

            <div class="mb-3">
                <label class="form-label">Tienda:</label>
                <select name="store" class="form-select">
                    <option value="Ninguna">--Seleccione una tienda--</option>
                    @foreach($tiendas as $tienda)
                    <option value="{{$tienda->nombre}}">{{$tienda->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Empleado:</label>
                <select name="user" class="form-select">
                    <option value="Ninguna">--Seleccione un vendedor--</option>
                    @foreach($usuarios as $usuario)
                    <option value="{{$usuario->nombre}}">{{$usuario->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Producto:</label>
                <select name="product" class="form-select">
                    <option value="Ninguna">--Seleccione un producto--</option>
                    @foreach($productos as $producto)
                    <option value="{{$producto->nombre}}">{{$producto->nombre}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Precio:</label><br>
                <input type="number" step="0.1" name="price" onchange="cal()" onkeyup="cal()" />
            </div>
            <div class="mb-3">
                <label class="form-label">Cantidad:</label><br>
                <input type="number" name="quantity" onchange="cal()" onkeyup="cal()" />
            </div>

            <input type="hidden" name="total" value="0" readonly="readonly" />

            <div class="d-grid-gap2">
                <input type="submit" value="Vender" class="btn btn-primary" />
            </div>
        </form>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tienda</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Costo</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $venta)
                <tr>
                    <th scope="row">{{$venta->id}}</th>
                    <td>{{$venta->store}}</td>
                    <td>{{$venta->user}}</td>
                    <td>{{$venta->product}}</td>
                    <td>{{$venta->price}}</td>
                    <td>{{$venta->quantity}}</td>
                    <td>{{$venta->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <footer class="bd-footer py-3 mt-3 text-center">Desarrollo Móvil Multiplataforma, &#169UTVT - 2022</footer>
    </div>
</body>