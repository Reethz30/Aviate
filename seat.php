<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Seat Map</title>
    <style>
        *, *:before, *:after {
            box-sizing: border-box;
        }


        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .total-amount {
            text-align: center;
            margin-top: 20px;
        }

        .btn-book {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #5C6AFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-book:hover {
            background-color: #4454e3;
        }

        .plane {
            max-width: 600px;
            margin: 20px auto;
            padding: 10px;
            border: 1px solid #ccc;
            position: relative;
        }

        .cockpit {
            text-align: center;
            margin-bottom: 10px;
        }

        .seat-map {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .row {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
        }

        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            border: 1px solid #ccc;
            cursor: pointer;
            background-color: #fff;
        }

        .aisle {
            width: 20px;
            height: 40px;
            margin: 5px;
            cursor: default;
        }

        .seat.occupied {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .seat.selected {
            background-color: #5C6AFF;
            color: #fff;
        }

        .exit {
            width: 80px;
            height: 40px;
            position: absolute;
            background-color: #FF6347;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            color: #fff;
        }

      

        

        .exit.exit--side-left {
            top: 50%;
            left: 0;
            transform: translateY(-50%);
        }

        .exit.exit--side-right {
            top: 50%;
            right: 0;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <div class="plane">
        <div class="cockpit">
            <h1>Please select a seat</h1>
        </div>
        <div class="seat-map">
            <!-- Generate seats using JavaScript -->
        </div>
        
        <div class="exit exit--side-left">Left Side Exit</div>
        <div class="exit exit--side-right">Right Side Exit</div>
    </div>

    <p style="text-align: center;">Selected Seat: <span id="selectedSeat">None</span></p>
    <button class="btn-book" onclick="bookTickets()">Book My Tickets</button>
   

    <script>
        const rows = 10;
        const seatsPerRow = 6;
        const aislesPerRow = 2;
        const seatMap = document.querySelector('.seat-map');
        const selectedSeatElement = document.getElementById('selectedSeat');
        const selectedSeats = [];
        let flightNum;
        function generateSeats() {
            for (let row = 1; row <= rows; row++) {
                const rowElement = document.createElement('div');
                rowElement.classList.add('row');

                for (let i = 1; i <= seatsPerRow; i++) {
                    const seat = document.createElement('div');
                    seat.classList.add('seat');
                    seat.textContent = row + String.fromCharCode(64 + i);

                    if (i % (seatsPerRow / aislesPerRow) === 0) {
                        const aisle = document.createElement('div');
                        aisle.classList.add('aisle');
                        rowElement.appendChild(aisle);
                    }

                    rowElement.appendChild(seat);
                }

                seatMap.appendChild(rowElement);
            }

        }

        function toggleSeatSelection() {
            if (this.classList.contains('occupied')) {
                alert('This seat is already occupied.');
                return;
            }

            const seatLabel = this.textContent;
            const index = selectedSeats.indexOf(seatLabel);

            if (index === -1) {
                selectedSeats.push(seatLabel);
            } else {
                selectedSeats.splice(index, 1);
            }

            this.classList.toggle('selected');
            updateSelectedSeat();

            // Store the selected seats after updating
            storeSelectedSeats();
        }

        function updateSelectedSeat() {
            selectedSeatElement.textContent = selectedSeats.join(', ') || 'None';
        }

        function showSelectedSeats() {
            alert(`Selected Seat(s): ${selectedSeats.join(', ') || 'None'}`);
        }

        function storeSelectedSeats() {
            // Store the selected seats in localStorage
            localStorage.setItem('selectedSeats', JSON.stringify(selectedSeats));
        }

        function bookTickets() {
            const query = window.location.search;
            const urlPar = new URLSearchParams(query);
            flightNum = urlPar.get('flight');
            const selectedSeatsS = selectedSeats.join(',');

            
            const numberOfSelectedSeats = selectedSeats.length;

            
            localStorage.setItem('numberOfSelectedSeats', numberOfSelectedSeats);

            
            window.location.href = `payment.php?flight=${flightNum}&seats=${selectedSeatsS}`;
        }
        generateSeats();
        const seats = document.querySelectorAll('.seat');
        seats.forEach(seat => seat.addEventListener('click', toggleSeatSelection));
    </script>
</body>
</html>