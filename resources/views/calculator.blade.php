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
    // function appendToDisplay(value) {
    //     document.getElementById('display').innerText += value;
    // }
    //
    // function calculateResult() {
    //     const expression = document.getElementById('display').innerText;
    //     const result = eval(expression);
    //
    //     document.getElementById('display').innerText = result;
    // }
    //
    // function clearLast() {
    //     let currentDisplay = document.getElementById('display').innerText;
    //     document.getElementById('display').innerText = currentDisplay.slice(0, -1);
    // }

    function appendToDisplay(value) {
        document.getElementById('display').innerText += value;
    }

    function calculateResult() {
        const expression = document.getElementById('display').innerText;

        // Send expression to the server for calculation
        fetch('/api/calculate', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ expression }),
        })
            .then(response => response.json())
            .then(data => {
                document.getElementById('display').innerText = data.result;

                // After calculating, update the history
                updateHistory();
            })
            .catch(error => console.error('Error:', error));
    }

    function updateHistory() {
        // Fetch the calculation history from the server
        fetch('/api/history', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
            },
        })
            .then(response => response.json())
            .then(data => {
                // Update the history list on the page
                const historyList = document.querySelector('.history ul');
                historyList.innerHTML = '';

                data.history.forEach(calculation => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${calculation.expression} = ${calculation.result}`;
                    historyList.appendChild(listItem);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    function clearLast() {
        let currentDisplay = document.getElementById('display').innerText;
        document.getElementById('display').innerText = currentDisplay.slice(0, -1);
    }

    // Initial load of the history when the page loads
    updateHistory();
</script>
</body>
</html>
