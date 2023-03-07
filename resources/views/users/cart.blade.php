<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add to cart</title>
</head>

<body>

    @if ($carts->count() > 0)
    <table>
        <tr>
            <th>ID</th>
            <th>Books</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
        @foreach ($carts as $cart)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td class="book-image">
                <img src="{{ $cart->book->getFirstMediaUrl('images') }}" alt="">
            </td>
            <td>
                <p class="book-name products__list--name">
                    {{ $cart->book->name }}</p>
            </td>
            <td>
                <p class="price booklist--price">
                    Rs.
                    <span class="actual-price">{{ $cart->book->price }}</span>
                </p>
            </td>
            <td>
                <p class="book-quantity ">
                    {{ $cart->quantity }}</p>
            </td>

            <td>
                <p class="price products__list--price">Rs.
                    <span class="total-after-quantity">{{ $cart->quantity * $cart->book->price }}</span>
                </p>
            </td>
            <td>
                <form id="remove-from-cart" method="POST" action="{{ route('cart.destroy', $cart->id) }}">
                    @csrf
                    @method('delete')
                    <button class="btn btn-primary " type="submit">
                        Delete</i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    @else
    <h3>No items found on cart</h3>
    @endif
</body>
</html>