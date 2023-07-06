<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Id</td>
            <td>Nome</td>
            <td>Categorias</td>
        </tr>
        @foreach ($produtos as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nome}}</td>
                <td>
                    <ul>
                        @foreach ($item->categorias as $categoria)
                           <li>{{$categoria->nome}}</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>