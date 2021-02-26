<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories</title>
</head>
<body>
    <table>
        <thead>
            <th>Categorias</th>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <th>
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <button type="submit">Agrergar</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>