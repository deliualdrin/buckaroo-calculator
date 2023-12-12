<!-- resources/views/calculator.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .calculator {
            width: 300px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .display {
            font-size: 24px;
            text-align: right;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .buttons {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }

        .history {
            margin-top: 20px;
        }

        button {
            padding: 10px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="calculator">
    <div class="display" id="display">0</div>
    <div class="buttons" id="buttons">
        <button onclick="appendToDisplay('7')">7</button>
        <button onclick="appendToDisplay('8')">8</button>
        <button onclick="appendToDisplay('9')">9</button>
        <button onclick="appendToDisplay('/')">/</button>
        <button onclick="appendToDisplay('4')">4</button>
        <button onclick="appendToDisplay('5')">5</button>
        <button onclick="appendToDisplay('6')">6</button>
        <button onclick="appendToDisplay('*')">*</button>
        <button onclick="appendToDisplay('1')">1</button>
        <button onclick="appendToDisplay('2')">2</button>
        <button onclick="appendToDisplay('3')">3</button>
        <button onclick="appendToDisplay('-')">-</button>
        <button onclick="appendToDisplay('0')">0</button>
        <button onclick="appendToDisplay('.')">.</button>
        <button onclick="calculateResult()">=</button>
        <button onclick="appendToDisplay('+')">+</button>
        <button onclick="clearLast()">C</button>
    </div>

    <div class="history">
        <h2>Calculation History</h2>
        <ul>
            @foreach($userCalculations as $calculation)
                <li>{{ $calculation->expression }} = {{ $calculation->result }}</li>
            @endforeach
        </ul>
    </div>
</div>

<script>
    async function appendToDisplay(value) {
        document.getElementById('display').innerText += value;
    }

    async function calculateResult() {
        const expression = document.getElementById('display').innerText;

        try {
            await fetch('/api/calculate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({
                    expression: expression,
                }),
            });

            const resultResponse = await fetch(`/api/calculate?expression=${encodeURIComponent(expression)}`);
            const resultData = await resultResponse.json();

            document.getElementById('display').innerText = resultData.result;
        } catch (error) {
            console.error('Error:', error);
        }
    }

    async function clearLast() {
        let currentDisplay = document.getElementById('display').innerText;
        document.getElementById('display').innerText = currentDisplay.slice(0, -1);
    }

    async function fetchHistory() {
        try {
            const userId = {{ auth()->id() ?? 'null' }};
            const historyResponse = await fetch(`/api/history/${userId}`);
            const historyData = await historyResponse.json();

            console.log('Calculation History:', historyData.history);
        } catch (error) {
            console.error('Error fetching history:', error);
        }
    }

    fetchHistory();
</script>
</body>
</html>
