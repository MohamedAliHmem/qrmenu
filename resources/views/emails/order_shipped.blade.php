<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Commande!</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #dddddd;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            background-color: #0073e6;
            color: #ffffff;
            padding: 10px 0;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content h2 {
            color: #333333;
        }
        .content p {
            color: #666666;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f4f4f4;
            color: #888888;
            font-size: 12px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            font-size: 16px;
            color: #ffffff;
            background-color: #0073e6;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Nouvelle Commande!</h1>
        </div>
        <div class="content">
            <p>Détails de la commande:</p>
            <ul>
                @foreach ($orderDetails['products'] as $product)
                    <li>
                        <strong>Nom du produit:</strong>
                        @if ($product['category_title'])
                            ({{$product['category_title']}})
                        @endif
                        {{ $product['product_name'] }} × {{ $product['product_quantity'] }}<br>

                        <strong>Prix:</strong> {{ $product['product_price'] }} DT<br>
                        <strong>Total:</strong> {{ $product['total_price'] }} DT
                    </li>
                @endforeach
            </ul>
            <p><strong>Prix Total:</strong> {{ $orderDetails['total_price'] }} DT</p>
            <p><strong>Numéro du tableau:</strong> {{ $orderDetails['table_number'] }}</p>

            @if ($orderDetails['remarque'])
                <p><strong>Remarque:</strong> {{ $orderDetails['remarque'] }}</p>
            @endif
        </div>
        <div class="footer">
            &copy; 2024 PALOMA TECH SOLUTIONS. Tous droits réservés.<br>
            Nabeul, Tunisie
        </div>
    </div>
</body>
</html>
