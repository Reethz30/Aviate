<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="book.css">
    <script src="book.js"></script>
</head>
<body onload="getDetails()">
       <div class="heading">
           <h1>SEARCH FLIGHTS</h1>
       </div>
       <div class="main">
           <div class="flight-details">
                <form>
                    <label>FROM:
                        <input type="text" value="DELHI" id="fromAddress" readonly>
                    </label>
                    <label>TO:
                        <input type="text" value="PUNE" id="toAddress" readonly>
                    </label>
                    <label>
                        <input type="text" value="ONE WAY" readonly>
                    </label>

                </form>
           </div>
           <div class="flights">
                <span id="time-place">
                    <input type="time" placeholder=" " id="input-1" value="11:00" readonly>
                    <input id="input-2"type="text" value="PM" readonly>
                    <span class="hiphen">-</span>
                    <input id="input-3" type="time"  placeholder=" " value="01:00" readonly><input type="text" id="input-4" value="AM" readonly>
                    <br>
                    <span id="flight-name">
                        <input type="text" id="input-5" value="VISTARA" readonly>
                    </span>
                </span>
                <span>
                    <input type="text" id="input-6" value="2hrs" readonly><input id="input-7" type="text" value="NONSTOP" readonly>
                    
                </span>
                <span>
                    <input type="text" id="input-8" value="" class="from" readonly><span class="hiphen">-</span><input type="text" id="input-9" class="to"value="" readonly>
                    
                </span>
                <span>
                    <button id="button1" onclick="confirmation(1)">confirm</button>                   
                </span>
           </div>
           <div class="flights">
            <span id="time-place">
                <input type="time" placeholder=" " id="input-1" value="11:00" readonly><input id="input-2"type="text" value="PM" readonly><span class="hiphen">-</span><input id="input-3" type="time"  placeholder=" " value="01:00" readonly><input type="text" id="input-4" value="AM" readonly>
                <br>
                <span id="flight-name">
                    <input type="text" id="input-5"value="VISTARA" readonly>
                </span>
            </span>
            <span>
                <input type="text" id="input-6" value="2hrs" readonly><input id="input-7" type="text" value="NONSTOP" readonly>
                
            </span>
            <span>
                <input type="text" id="input-8" value="" class="from"readonly><span class="hiphen">-</span><input type="text" id="input-9" class="to" value="" readonly>
                
            </span>
            <span>
                <button id="button1" onclick="confirmation(2)">confirm</button>                   
            </span>
       </div>
       <div class="flights">
        <span id="time-place">
            <input type="time" placeholder=" " id="input-1" value="11:00" readonly><input id="input-2"type="text" value="PM" readonly><span class="hiphen">-</span><input id="input-3" type="time"  placeholder=" " value="01:00" readonly><input type="text" id="input-4" value="AM" readonly>
            <br>
            <span id="flight-name">
                <input type="text" id="input-5"value="VISTARA" readonly>
            </span>
        </span>
        <span>
            <input type="text" id="input-6" value="2hrs" readonly><input id="input-7" type="text" value="NONSTOP" readonly>
            
        </span>
        <span>
            <input type="text" id="input-8" value="" class="from"readonly><span class="hiphen">-</span><input type="text" id="input-9" value=""  class="to" readonly>
            
        </span>
        <span>
            <button id="button1" onclick="confirmation(3)">confirm</button>                   
        </span>
                </div>
                <div class="flights">
                    <span id="time-place">
                        <input type="time" placeholder=" " id="input-1" value="11:00" readonly><input id="input-2"type="text" value="PM" readonly><span class="hiphen">-</span><input id="input-3" type="time"  placeholder=" " value="01:00" readonly><input type="text" id="input-4" value="AM" readonly>
                        <br>
                        <span id="flight-name">
                            <input type="text" id="input-5"value="VISTARA" readonly>
                        </span>
                    </span>
                    <span>
                        <input type="text" id="input-6" value="2hrs" readonly><input id="input-7" type="text" value="NONSTOP" readonly>
                        
                    </span>
                    <span>
                        <input type="text" id="input-8" class="from"value="" readonly><span class="hiphen">-</span><input type="text" id="input-9" class="to" value="" readonly>
                        
                    </span>
                    <span>
                        <button id="button1" onclick="confirmation(4)">confirm</button>                   
                    </span>
                </div>
                    </div>
</body>
<script>
 function getDetails() {
          const selectedFromAirport = localStorage.getItem("selectedFromAirport");
          const selectedToAirport = localStorage.getItem("selectedToAirport");

          document.getElementById("fromAddress").value = selectedFromAirport || "";
          document.getElementById("toAddress").value = selectedToAirport || "";
      }
function confirmation(flightNumber){
     window.location.href=`seat.php?flight=${flightNumber}`;
}

</script>
</html>