<!doctype html>
<html>
<head>
<title>HomePage</title>
<link rel="stylesheet" href="home1.css">
</head>
<body bgcolor=#1f1b3c>
    <div class="image">
        <img src="bac.jpg"/>
        <div class="box1">
            <div class="logo"><b style="color:white;font-size:28px;position: fixed;">AVIATE.</b></div>
        </div>    
        <div class="box2">
            <div class="book"><button onclick="book()">BOOK</button></div>
            <div class="check-in"><button onclick="payment()">CHECK-IN</button></div>
            <div class="login"><button onclick="login()">LOGIN</button></div>
            <div class="signup"><button onclick="signup()">SIGNUP</button></div>
        </div>
        <div class="qu">
            <h1 style="align-items: center;margin-left: 520px;margin-top:-450px;font-size: 80px;">AVIATE</h1>
            <h2 style="margin-left: 300px;font-size: 40px;margin-right: 300px;text-align: center;;">Travel far, travel wide. Register now to embark on unforgettable escapades.</h2>
        </div>
        </div>
        <div class="box3">
            <div class="domestic"><button>Domestic Flights</button></div>
            <div class="international"><button>International Flights</button></div>
            <div class="non-stop"><button>Non-Stop Flights</button></div>
            <div class="cargo"><button>Cargo Flights</button></div>
            <div class="chatered"><button>Chatered Flights</button></div>
        </div>
<form id="homepage" action="h.php" method="post">
        <div class="box4">
            <div class="flight-type">
                <label>
                    <input type="radio" name="flightType" value="oneway" checked> One Way
                </label>
                <label>
                    <input type="radio" name="flightType" value="roundtrip"> Round Trip
                </label>
                <label>
                    <input type="radio" name="flightType" value="multi-city"> Multi-City
                </label>
            </div>
        
            <div class="date-picker">
                <div class="from">                
        <label for="fromAirport" >From:</label><br>
            
            <select id="fromAirportSelect" name="from">
                <option value="GCET">Gcet Airport India</option>
              <option value="DEL">Indira Gandhi International Airport</option>
              <option value="GOI">Goa Dabolim International Airport</option>              
              <option value="BLR">Bengaluru International Airport</option>
              <option value="BKK">Bangkok Thailand</option>
              
            </select>
            <br>
            <button id="fromAirportBtn">Select Airport</button>
        </div>
          <div class="to">
            <label for="toAirport">To:</label><br>
            <select id="toAirportSelect" name="to">             
              <option value="GCET">Gcet Airport India</option>
              <option value="DEL">Indira Gandhi International Airport</option>
              <option value="GOI">Goa Dabolim International Airport</option>              
              <option value="BLR">Bengaluru International Airport</option>
              <option value="BKK">Bangkok Thailand</option>
            </select>
            <br>
            <button id="toAirportBtn">Select Airport</button>
            </div>

            <div class="date1">
            <label for="departureDate">Departure Date:</label>
            <br>
                <input type="date" id="departureDate" name="departureDate">
                </div>
        
                <div class="date2">
                <label for="returnDate">Return Date:</label><br>
                <input type="date" id="returnDate" name="returnDate" disabled>
                </div>
                <div class="pass">
                <label for="pass">Passengers:</label>
                <input type="number" id="pass" name="pass" min="1" required>
                </div>
          
            </div>
            <div class="fare">
                <label style="color: white;">Select A<br>Fare Type:</label>&nbsp;
                <div class="one">
                    <input type="radio" id="reg" name="fare" value="Faculty">
                    <label for="reg">Faculty<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fares</label></div>
                    &nbsp;
                <div class="two">
                    <input type="radio" id="armed" name="fare" value="Student">
                    <label for="armed">Student<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fares</label></div>
                    &nbsp;
                </div>    
             
        
            
<input type="submit" value="SEARCH" id="search" style=" color: black;
    background-color:white;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 0;
    left: 550px;
    padding: 20px 40px;
    width: fit-content;
    height: fit-content;
    margin-top: 360px;
    font-size: larger;
   border-radius: 20px;">
            
</div>
</form>
        <hr style="margin-top:850px;width:100%;">
        <div class="why" >
            <img src="logo.jpg"/>
            <p><b style="font-size:40px;">WHY AVIATE?</b><br><br>
            Our airline reservation ticket booking website provides a seamless and convenient platform for travelers to easily book their flights and manage their travel plans. With a user-friendly interface, our website allows customers to search for available flights, compare prices, and select preferred seats. The website offers secure and efficient payment processing, ensuring the safety of sensitive information. Additionally, customers can access real-time flight information, receive booking confirmations, and manage their bookings with ease. Our website aims to deliver a hassle-free and enjoyable booking experience, making it the go-to choice for travelers seeking a reliable and efficient airline reservation service.
            <br>This website has been made in collaboration with Geethanjali College of Engineering and Technology,Hyderabad - 501 301.<br><br><br>

            <button id="gcet"><a href="http://www.geethanjaliinstitutions.com/engineering/" target="_blank">ABOUT GEETHANJALI</a></button>  </p>
        </div> 
        <br>
        <br>
        <hr width="100%">
        <div class="footer">
            
            <div class="link">
                <h3>Quick Links</h3>
                <ul>
                    <li>Coupons & Discounts</li>
                    <li>Contact Us</li>
                    <li><a href="#about" style="color:white;text-decoration:none;">About us</a></li>
                </ul>
            </div>
            
            <div class="links" id="sup">
                <h3>Support</h3>
                <ul>
                    <li>FAQs</li>
                    <li>Report Issues</li>
                    <li>Terms & Conditions</li>
                    <li>Privacy Policy</li>
                </ul>
            </div>
        </div> 
        <footer class="fo" style="text-align: center;color: lightgray;padding: 16px;background-color: black;">
            <p>In Collabration with <a href="http://www.geethanjaliinstitutions.com/engineering/ " title=" Aviate " target="_blank" > GCET</a></p>
          </footer>     
</body>

        
        
        <script>

        document.getElementById("homepage").addEventListener("submit", function(event) {
          event.preventDefault();
            store();
            this.submit();
        });
           
            document.addEventListener('DOMContentLoaded', function () {
    const oneWayRadio = document.querySelector('input[value="oneway"]');
    const roundTripRadio = document.querySelector('input[value="roundtrip"]');
    const multiRadio = document.querySelector('input[value="multi"]');
    const returnDateInput = document.getElementById('returnDate');

    
    oneWayRadio.addEventListener('change', function () {
        returnDateInput.disabled = true;
    });

    roundTripRadio.addEventListener('change', function () {
        returnDateInput.disabled = false;
    });

    multiRadio.addEventListener('change', function () {
        returnDateInput.disabled = true;
    });
});
           
            const fromAirportBtn = document.getElementById("fromAirportBtn");
            const fromAirportSelect = document.getElementById("fromAirportSelect");
            const toAirportBtn = document.getElementById("toAirportBtn");
            const toAirportSelect = document.getElementById("toAirportSelect");
          
            
           
            function store() {
            const fromAirport = document.getElementById("fromAirportSelect").value;
            const toAirport = document.getElementById("toAirportSelect").value;

            localStorage.setItem("selectedFromAirport", fromAirport);
            localStorage.setItem("selectedToAirport", toAirport);

            // Redirect to the next page here
            window.location.href = "book.php";
        }
        function login(){
            window.location.href="login.php";
        }
        function signup(){
            window.location.href="s1.php";
        }
        function payment(){
            window.location.href="payment.php";
        }
        function book(){
            window.location.href="book.php";
        }
          </script> 
          
         
</html>