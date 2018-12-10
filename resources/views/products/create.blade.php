<html>
    <head>
        <title>Products</title>
    </head>
    <body>
        <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div>
                <table border="2">
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea type="text" name="description" id="description"></textarea></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="categories" id="categories">
                                <option value="" selected>Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
                <br/>
                <button type="submit">Save</button>
                <button><a href="{{ route('products.index') }}">Back</a></button>
            </div>
        </form>
    </body>
</html>