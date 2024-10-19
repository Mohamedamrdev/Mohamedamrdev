<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Books</title>
</head>

<body>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Date</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone number</th>
                <th scope="col">How many </th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if (isset($books) && count($books) > 0)
            @foreach ($books as $book)
            <tr>
                <td>#</td>
                <td>{{ $book->book_date }}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->email}}</td>
                <td>{{$book->phone_number}}</td>
                <td>{{$book->how_many}}</td>
            </tr>
            @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">No books found.</td>
                    </tr>
                @endif
        </tbody>
    </table>
    <form action="{{ route('index') }}" method="GET">
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <button type="submit" class="btn btn-primary btn-lg">Exit</button>
        </div>
    </form>
</body>

</html>
