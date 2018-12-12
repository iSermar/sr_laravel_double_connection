<html>
    <head>
        <title>Products</title>
    </head>
    <body>
        <div>
            <button><a href="{{ route('products.create') }}">Create</a></button>
            <br/><br/>
            <table border="2">
                <tr>
                    <td>#</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Category</td>
                    <td colspan="3" ><center>Actions</center></td>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        
                        @foreach ($product->categories as $category)                            
                            <td>{{ $category->name }}</td>
                        @endforeach

                        <td><button><a href="{{ route('products.show', $product->id) }}">Show</a></button></td>
                        <td><button><a href="{{ route('products.edit', $product->id) }}">Edit</a></button></td>
                        <td><button><a href="">Delete</a></button></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </body>
</html>