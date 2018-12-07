<html>
    <head>
        <title>Products</title>
    </head>
    <body>
        <div>
            <table border="2">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Category</td>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        @foreach ($product->categories as $category)                            
                            <td>{{ $category->name }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>