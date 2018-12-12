<html>
    <head>
        <title>Products</title>
    </head>
    <body>
        <form method="post" action="{{ route('products.update', $product->id) }}">
            <input name="_method" type="hidden" value="PATCH">
            {{ csrf_field() }}
            <div>
                <table border="2">
                    <tr>
                        <td>Nome:</td>
                        <td><input type="text" value="{{ $product->name }}" name="name" id="name"></td>
                    </tr>
                    <tr>
                        <td>Description:</td>
                        <td><textarea type="text" name="description" id="description">{{ $product->description }}</textarea></td>
                    </tr>
                    <tr>
                        <td>Category:</td>
                        <td>
                            <select name="categories" id="categories">
                                <option value="" selected>Select</option>
                                @foreach ($categories as $category)      
                                    <option value="{{ $category->id }}" {{ old('categories', $category->id) == $productCategory ? 'selected' : '' }}>{{ $category->name }}</option>
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