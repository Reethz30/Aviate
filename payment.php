<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Check-in</title>
  
  <link rel="stylesheet" href="payment.css">
</head>
<body onload="onLoading()">
  <header>
    <h1> C h e c k - I n </h1>
  </header>
  <main>
    <form id="paymentForm" action="pay.php" method="post">
      <div class="b">
      <div class="one">
      <label for="numberOfMembers">Number of Passengers:</label>
      <input type="number" id="numberOfMembers" name="numberOfMembers" min="1"  required>
      <br>

      <label for="cardHolderName">Cardholder Name:</label>
      <input type="text" id="cardHolderName" name="cardHolderName" required>

      <label for="from">From:</label>
      <input type="text" id="from" name="from" placeholder="" readonly required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      </div>

      <div class="one">
        <div class="two">
          
        <label for="t">
          <input type="radio"  name="t" value="faculty" onchange="checking()"checked> Faculty
          </label>
          <label for="t">
          <input type="radio" name="t" value="student" onchange="checking()"> Student
          </label><br>
      <label for="flightNumber">FlightNumber:</label>
      <input type="text" id="flightNumber" name="flightNumber" readonly >
<br>
      <label for="to">TO:</label>
      <input type="text" id="to" name="to" readonly required>
      <br>
      <label for="text">Seat Numbers:</label>
      <input type="text" id="text" name="seats" readonly>
      
      </div> 
      </div>
      </div>  
      <label for="text1">Total Amount:</label>
      <input type="text" id="text1" name="Price"  readonly>

      <input type="submit" value="Make Payment" onclick="checkAndConfirm()">
    </form>
  </main>
  <script>
    function onLoading() {
      const emailInput = document.getElementById('email');
      const storedEmail = localStorage.getItem('userEmail');
      const c = localStorage.getItem('numberOfSelectedSeats');
      const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));
      const seatNumbersInput = document.getElementById('text');
      seatNumbersInput.value = selectedSeats ? selectedSeats.join(', ') : '';
      let cost=0;

      if (storedEmail) {
        emailInput.value = storedEmail;
      }

      const sfa = localStorage.getItem('selectedFromAirport');
      const sta = localStorage.getItem('selectedToAirport');
      document.getElementById('numberOfMembers').value = c;

      if (sfa) {
        document.getElementById('from').value = sfa;
      }

      if (sta) {
        document.getElementById('to').value = sta;
      }
      

     
      updateTotalAmount();

      
      const fareTypeRadios = document.querySelectorAll('input[name="t"]');
      fareTypeRadios.forEach(radio => {
        radio.addEventListener('change', updateTotalAmount);
      });
    }

    function updateTotalAmount() {
      const fareTypeRadios = document.querySelectorAll('input[name="t"]');
      const numberOfSelectedSeats = parseInt(localStorage.getItem('numberOfSelectedSeats'));     
      let fareType;
      fareTypeRadios.forEach(radio => {
        if (radio.checked) {
          fareType = radio.value;
        }
      });  
      const flightDetails = {
        'GCET': {
          'DEL': { flightNumber: 'GCD123', cost: 8000 },
          'GOI': { flightNumber: 'GGO456', cost: 5500 },
          'BLR': { flightNumber: 'BGL789', cost: 4500 },
          'BKK': { flightNumber: 'BCG111', cost: 12000 }
        },
        'DEL': {
          'GCET': { flightNumber: 'DCT985', cost: 8200 },
          'GOI': { flightNumber: 'DLI237', cost: 8700 },
          'BLR': { flightNumber: 'RBE008', cost: 8800 },
          'BKK': { flightNumber: 'KKL104', cost: 13000 }
        },
        'GOI':{
          'GCET':{flightNumber: 'OCG001', cost: 5200},
          'DEL':{flightNumber: 'EIG591', cost: 8200},
          'BLR':{flightNumber: 'RGI743', cost: 3200},
          'BKK':{flightNumber: 'KOI271', cost: 12700},
        },
        'BLR':{
          'GCET':{flightNumber: 'TBC670', cost: 4700},
          'DEL':{flightNumber: 'BEE291', cost: 8900},
          'GOI':{flightNumber: 'LBI352', cost: 3500},
          'BKK':{flightNumber: 'KKR730', cost: 13500},
        },
        'BKK':{
          'GCET':{flightNumber: 'CBG541', cost: 10200},
          'DEL':{flightNumber: 'BKL236', cost: 12200},
          'BLR':{flightNumber: 'BBR523', cost: 12700},
          'GOI':{flightNumber: 'BOI234', cost: 12950},
        }
      };


      const sfa = document.getElementById('from').value;
      const sta = document.getElementById('to').value;

      document.getElementById('flightNumber').value = flightDetails[sfa]?.[sta]?.flightNumber || '';

      // Get the selected fare type
        
      let totalAmount = 0;
      if (fareType === 'faculty') {
        totalAmount = flightDetails[sfa]?.[sta]?.cost * numberOfSelectedSeats;
      } else if (fareType === 'student') {
        totalAmount = (flightDetails[sfa]?.[sta]?.cost-500) * numberOfSelectedSeats;
      }

      // Update the Total Amount input field
      const totalAmountInput = document.getElementById('text1');
      totalAmountInput.value = totalAmount;

      
      localStorage.setItem('totalAmount', totalAmount);
    }
    
    
</script>
  
</body>
</html>