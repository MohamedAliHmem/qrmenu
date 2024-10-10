<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
</head>
<body>
    @include('pos.components.header')
    <div class="payment-page">
        <div class="header">
            <button onclick="window.history.back()" class="back-button">Retour</button>
            <h1>Paiement</h1>
        </div>
        <div class="payment-container">
            <div class="payment-methods">
                <button class="payment-method selected">Cash</button>
                <button class="payment-method" disabled>Bank</button>
                <button class="payment-method" disabled>Customer Account</button>
                <div class="summary">
                    <h2>Résumé</h2>
                    <div class="summary-item">
                        <span>Cash</span>
                        <span id="amount-paid">0,000</span> DT
                        <button class="delete-button" onclick="handleDelete()">✖</button>
                    </div>
                </div>
            </div>
            <div class="payment-details">
                <div class="payment-info">
                    <p>Restant: 0,000 DT</p>
                    <p>Monnaie: <span id="change">0,000</span> DT</p>
                    <p>Montant dû: {{ number_format($total, 3, ',', ' ') }} DT</p>
                </div>
                <div class="keypad">
                    @foreach (['1', '2', '3', '+10', '4', '5', '6', '+20', '7', '8', '9', '+50', '+/-', '0', ',', '✖'] as $key)
                        <button class="keypad-button" onclick="handleAmountClick('{{ $key }}')">{{ $key }}</button>
                    @endforeach
                </div>
                <button class="validate-button" onclick="handleSubmit()">Valider</button>
            </div>
        </div>
    </div>
    <script>
        let amountPaid = '';
        const total = {{ $total }};

        function handleAmountClick(value) {
            amountPaid += value;
            document.getElementById('amount-paid').textContent = parseFloat(amountPaid).toLocaleString();
            calculateChange();
        }

        function handleDelete() {
            amountPaid = '';
            document.getElementById('amount-paid').textContent = '0,000';
            calculateChange();
        }

        function calculateChange() {
            const paid = parseFloat(amountPaid || '0');
            const change = paid - total;
            document.getElementById('change').textContent = change.toLocaleString();
        }

        function handleSubmit() {
            alert('Payment Submitted');
        }
    </script>
</body>
</html>
