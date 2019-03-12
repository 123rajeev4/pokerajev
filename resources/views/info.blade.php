 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PokkerBuddy | Services</title>  
<link rel="shortcut icon" href="http://mobulous.in/homefuud/totrr_favicon.ico"/>
<style>


.content {
    width: 60%;
    margin: 50px auto;
    padding: 20px;
  }
  .content h1 {
    font-weight: 400;
    text-transform: uppercase;
    margin: 0;
  }
  .content h2 {
    font-weight: 400;
    text-transform: uppercase;
    color: #333;
    margin: 0 0 20px;
  }
  .content p {
    font-size: 1em;
    font-weight: 300;
    line-height: 1.5em;
    margin: 0 0 20px;
  }
  .content p:last-child {
    margin: 0;
  }
  .content a.button {
    display: inline-block;
    padding: 10px 20px;
    background: #ff0;
    color: #000;
    text-decoration: none;
  }
  .content a.button:hover {
    background: #000;
    color: #ff0;
  }
  .content.title {
    position: relative;
    background: none;
    border: 2px dashed #333;
  }
  .content.title h1 span.demo {
    display: inline-block;
    font-size: .5em;
    padding: 5px 10px;
    background: #000;
    color: #fff;
    vertical-align: top;
    margin: 7px 0 0;
  }
  .content.title .back-to-article {
    position: absolute;
    bottom: -20px;
    left: 20px;
  }
  .content.title .back-to-article a {
    padding: 10px 20px;
    background: #f60;
    color: #fff;
    text-decoration: none;
  }
  .content.title .back-to-article a:hover {
    background: #f90;
  }
  .content.title .back-to-article a i {
    margin-left: 5px;
  }
  .content.white {
    background: #fff;
    box-shadow: 0 0 10px #999;
  }
  .content.black {
    background: #000;
  }
  .content.black p {
    color: #999;
  }
  .content.black p a {
    color: #08c;
  }

  .accordion-container {
    width: 100%;
    margin: 0 0 20px;
    clear: both;
  }
  .accordion-toggle {
    margin-bottom: 15px;
    position: relative;
    display: block;
    padding: 15px;
    font-size: 1.2em;
    font-weight: 300;
    background: #BBB;
    color: #fff;
    text-decoration: none;
    font-family: Bree serif !important;
  }
  .accordion-toggle.open {
    background: #1e2e65;
    color: #fff;
  }
  .accordion-toggle:hover {
    background:rgb(237,156,40);
    color: #fff!important;
  }
  .accordion-toggle span.toggle-icon {
    position: absolute;
    top: 17px;
    left: 20px;
    font-size: 1.5em;
  }
  .accordion-content {
    display: none;
    padding: 20px;
    overflow: auto;
    font-family: Bree serif;
  }
  .accordion-content img {
    display: block;
    float: left;
    margin: 0 15px 10px 0;
    max-width: 100%;
    height: auto;
  }

  /* media query for mobile */
  @media (max-width: 767px) {
    .content {
      width: auto;
    }
    .accordion-content {
      padding: 10px 0;
      overflow: inherit;
    }
  }
</style>
<div class="container pages">
    <div class="row text-left" style="padding:10px;">
      <h2 style="text-align:center;"></h2>
        <div class="page-header"><h3>Service Listing</h3></div>
        <div class="page-header">Service Url : mobulous.app/pokkerbuddy/api/</div><br/>
     


<!-- *************************login normal*********************************************** -->
      <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">1) signup</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>  
          <p>
              <h5>Parameters: </h5>
              <pre>
                  name,country,dob,gender,email,password,confirm_password,deviceToken,deviceType
                </pre>
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>signup</p>    
          <p> <h5>Sample Response: </h5>
            <pre>
            {
                "status": "SUCCESS",
                "message": "User created successfully.",
                "requestKey": "api/signup",
                "data": {
                    "id": 9,
                    "name": Rajiv,  
                    "country": Kumar,
                    "dob": 04-07-1990,
                    "gender": Male,
                    "email": "kumarrajiv1000@gmail.com",
                    "password": "123456",
                    "confirm_password": "123456",
                    "deviceType": "Android",
                    "deviceToken": "fsdfsfsdfsdf",
                    "token": "Q1qRVib5mofpTLCIkimeq8h9x"  
                }
            }
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

       <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">2) login</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>  
          <p>
              <h5>Parameters: </h5>
              <pre>
                 name,password,deviceToken,deviceType  
                </pre>
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>login</p>
          <p> <h5>Sample Response: </h5>
            <pre>
            {
                "status": "SUCCESS",
                "message": "User login successfully.",
                "requestKey": "api/login",
                "data": {
                    "token": "vcg2DAsljuNGWr5Rpg8cU00Z8",
                    "name": "test",
                    "email": "test@gmail.com",
                    "password": "12345678",
                    "confirm_password": "12345678",
                    "deviceType": "android",
                    "deviceToken": "fsdfsfsdfsdf"
                }
            }   
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

       <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">3) CreateGame</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>  
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token,event_date('Y-m-d'),event_time(15.00),seats,zip_code,event_description    
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>CreateGame</p>
          <p> <h5>Sample Response: </h5>
            <pre>
            {
                "status": "SUCCESS",
                "message": "Game created successfully.",
                "requestKey": "api/CreateGame",
                "data": {
                    "event_date": "2018-08-07",
                    "event_time": "21.00",
                    "seats": "20",
                    "zip_code": "201204",
                    "event_description": "hello",
                    "user_id": "18",
                    "updated_at": "2018-08-08 06:35:49",
                    "created_at": "2018-08-08 06:35:49",
                    "id": 5
                }
            }    
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

      <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">4) home</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>  
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token      
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>home</p>
          <p> <h5>Sample Response: </h5>
            <pre>
            {
    "status": "SUCCESS",
    "message": "Home Listing.",
    "requestKey": "api/home",
    "data": {
        "home_listing": [
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
                "id": "97",
                "name": "sonu1",
                "user_id": 17,
                "seats": "5",
                "avible_seats": 4,
                "home_number": "2503",
                "street_number": "12132",
                "event_date": "2019-02-25",
                "event_time": "02:00 PM",
                "zip_code": "12012",
                "event_description": "this is demo event",
                "lat": "28.62669",
                "log": "77.38585",
                "join_status": ""
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
                "id": "96",
                "name": "sonu1",
                "user_id": 17,
                "seats": "5",
                "avible_seats": 5,
                "home_number": "2503",
                "street_number": "12132",
                "event_date": "2019-02-25",
                "event_time": "02:00 PM",
                "zip_code": "12012",
                "event_description": "this is demo event",
                "lat": "28.62669",
                "log": "77.38585",
                "join_status": ""
            },
            
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "23",
                "name": "adnan12345",
                "user_id": 22,
                "seats": "4",
                "avible_seats": 4,
                "home_number": "",
                "street_number": "",
                "event_date": "2018-08-16",
                "event_time": "02:12 PM",
                "zip_code": "123456",
                "event_description": "Thishlsdhfkjfv",
                "lat": "",
                "log": "",
                "join_status": ""
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "22",
                "name": "adnan12345",
                "user_id": 22,
                "seats": "5",
                "avible_seats": 5,
                "home_number": "",
                "street_number": "",
                "event_date": "2018-08-16",
                "event_time": "04:08 PM",
                "zip_code": "123456",
                "event_description": "This sioyhsihugewf",
                "lat": "",
                "log": "",
                "join_status": ""
            },
            
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
                "id": "4",
                "name": "sonu1",
                "user_id": 17,
                "seats": "20",
                "avible_seats": 14,
                "home_number": "",
                "street_number": "",
                "event_date": "2018-08-07",
                "event_time": "09:00 PM",
                "zip_code": "201204",
                "event_description": "hello",
                "lat": "28.62669",
                "log": "77.38585",
                "join_status": ""
            }
        ]
    }
}  
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 


       <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">5) editUserProfile</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>       
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token,image(optinal),home_zip_code      
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>home</p>
          <p> <h5>Sample Response: </h5>
            <pre>
                        {
                "status": "SUCCESS",
                "message": "User Profile successfully updated",
                "requestKey": "api/editUserProfile",
                "data": {
                    "id": 17,
                    "name": "aaaa12",
                    "country": "India",
                    "email": "aaaa@gmail.com",
                    "dob": "08/07/2018",
                    "status": "Active",
                    "image": "http://mobulous.app/pokkerbuddy/public/userimage/73bfb13b4bc2ce3c8c10c77fc51a03f96331.jpg",
                    "home_zip_code": "201301",
                    "gender": "Male",
                    "confirm_password": "aaaa12as",
                    "created_at": "2018-08-07 05:30:06",
                    "updated_at": "2018-08-10 09:41:19",
                    "hosted_event": "",
                    "join_event": ""
                }
            }     
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

      <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">6) viewUserProfile</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>       
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token               
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>home</p>
          <p> <h5>Sample Response: </h5>
            <pre>
             {
                "status": "SUCCESS",
                "message": "User Profile successfully updated",
                "requestKey": "api/viewUserProfile",
                "data": {
                    "id": 17,
                    "name": "aaaa12",
                    "country": "India",
                    "email": "aaaa@gmail.com",
                    "dob": "08/07/2018",
                    "status": "Active",
                    "image": "http://mobulous.app/pokkerbuddy/public/userimage/73bfb13b4bc2ce3c8c10c77fc51a03f96331.jpg",
                    "zip_code": "201301",
                    "gender": "Male",
                    "confirm_password": "aaaa12as",
                    "created_at": "2018-08-07 05:30:06",
                    "updated_at": "2018-08-10 09:41:19",
                    "hosted_event": "",
                    "join_event": ""
                }
            }              
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

       <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">7) JoinGames</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>       
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token,game_id,status('Pending')                    
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>home</p>
          <p> <h5>Sample Response: </h5>
            <pre>
             {
                  "status": "SUCCESS",
                  "message": "Game Join successfully.",
                  "requestKey": "api/JoinGames",
                  "data": {
                      "game_id": "4",
                      "user_id": "17",
                      "status": "Pending",
                      "updated_at": "2018-08-10 11:01:34",
                      "created_at": "2018-08-10 11:01:34",
                      "id": 1
                  }
              }               
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div>

      <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">8) changePassword</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>       
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token,oldpassword,password                      
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>changePassword</p>
          <p> <h5>Sample Response: </h5>
            <pre>
             {
                "status": "SUCCESS",
                "message": "Password Changed successfully",
                "requestKey": "api/changePassword",
                "data": {
                    "status": "success"
                }
            }               
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

      <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">9) forgotPassword</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>       
          <p>
              <h5>Parameters: </h5>
              <pre>
                 email                      
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>forgotPassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
             {
                  "status": "SUCCESS",
                  "message": "User mail sent successfully",
                  "requestKey": "api/forgotPassword",
                  "data": {
                      "opt": 891954
                  }
              }              
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 


      <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">10) updatePassword</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
                 email,new_password,confirm_password                      
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
             {
                "status": "SUCCESS",
                "message": "password save successfully.",
                "requestKey": "api/updatePassword",
                "data": {
                    "id": 17,
                    "name": "aaaa12",
                    "country": "India",
                    "email": "kumarrajiv488@gmail.com",
                    "dob": "08/07/2018",
                    "status": "Active",
                    "image": "userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
                    "zip_code": "201301",
                    "gender": "Male",
                    "confirm_password": "123456",
                    "created_at": "2018-08-07 05:30:06",
                    "updated_at": "2018-08-17 06:37:34"
                }
            }              
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

      <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">11) sendCode</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
                 email,name                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
             {
              "status": "SUCCESS",
              "message": "Mail send successfully ",
              "requestKey": "api/sendCode",
              "data": {
                  "otp": 9248
              }
          }                
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div>   

        <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">12) gameListing</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
             {
    "status": "SUCCESS",
    "message": "Game Listing.",
    "requestKey": "api/gameListing",
    "data": {
        "game_listing": [
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "73",
                "name": "adnan12345",
                "user_id": 22,
                "seats": "5",
                "avible_seats": 1,
                "event_date": "2018-08-20",
                "event_time": "08:38 PM",
                "zip_code": "jsj728",
                "event_description": "Hshs",
                "createdon": "2018-08-20 15:08:51",
                "join_status": ""
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "67",
                "name": "adnan12345",
                "user_id": 22,
                "seats": "2",
                "avible_seats": 0,
                "event_date": "2018-08-22",
                "event_time": "09:51 AM",
                "zip_code": "58854448",
                "event_description": "Ash test 2",
                "createdon": "2018-08-20 12:04:41",
                "join_status": ""
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "66",
                "name": "adnan12345",
                "user_id": 22,
                "seats": "5",
                "avible_seats": 4,
                "event_date": "2019-08-22",
                "event_time": "05:33 PM",
                "zip_code": "383885955",
                "event_description": "Ash testing m3 part 2",
                "createdon": "2018-08-20 12:03:52",
                "join_status": ""
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "65",
                "name": "adnan12345",
                "user_id": 22,
                "seats": "3",
                "avible_seats": 1,
                "event_date": "2018-08-20",
                "event_time": "05:31 PM",
                "zip_code": "4784839393",
                "event_description": "Ash testing 2 M3",
                "createdon": "2018-08-20 12:02:26",
                "join_status": ""
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "63",
                "name": "adnan12345",
                "user_id": 22,
                "seats": "10",
                "avible_seats": 10,
                "event_date": "2018-08-21",
                "event_time": "05:26 PM",
                "zip_code": "3579478",
                "event_description": "Ash testing",
                "createdon": "2018-08-20 11:56:06",
                "join_status": ""
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "6",
                "name": "adnan12345",
                "user_id": 22,
                "seats": "4",
                "avible_seats": 1,
                "event_date": "2018-08-08",
                "event_time": "01:54 PM",
                "zip_code": "111111",
                "event_description": "Event Descriptionsdfdg",
                "createdon": "2018-08-08 08:25:07",
                "join_status": "Pending"
            }
        ]
    }
}              
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

        <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">13) gameRequestList</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
           {
    "status": "SUCCESS",
    "message": "Game Request.",
    "requestKey": "api/gameRequestList",
    "data": {
        "game_request": [
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
                "id": "220",
                "name": "sonu1",
                "user_id": 17,
                "event_date": "2018-08-20",
                "event_time": "05:31 PM",
                "join_status": "Pending",
                "createdon": "2019-01-30 13:53:47"
            }
        ],
        "game_friend": [
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
                "id": "107",
                "name": "sonu1",
                "user_id": 17,
                "join_status": "Approved",
                "createdon": "2019-01-30 23:54:59"
            },
            {
                "image": "https://mobulous.app/fametales/public/img/user_signup.png",
                "id": "218",
                "name": "amit12",
                "user_id": 18,
                "join_status": "Approved",
                "createdon": "2019-01-31 00:27:17"
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
                "id": "219",
                "name": "sonu1",
                "user_id": 17,
                "join_status": "Approved",
                "createdon": "2019-01-31 00:05:30"
            }
        ]
    }
}           </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div>  
       <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">14) RequestAcceptReject</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token,id,status(Approved,Decline)                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
           {
    "status": "SUCCESS",
    "message": "Request Updated successfully",
    "requestKey": "api/RequestAcceptReject",
    "data": {
        "id": 216,
        "user_id": "22",
        "game_host_id": "17",
        "game_id": "95",
        "status": "Approved",
        "created_at": "2019-01-30 05:49:12",
        "updated_at": "2019-01-30 13:41:02"
    }
}      
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div>


       <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">15) JoinedGames</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
      {
    "status": "SUCCESS",
    "message": "Joined Games.",
    "requestKey": "api/JoinedGames",
    "data": {
        "joined_games": [
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "107",
                "name": "adnan12345",
                "game_id": 4,
                "event_date": "2018-08-07",
                "event_time": "09:00 PM",
                "seats": "20",
                "home_number": "",
                "zip_code": "201204",
                "event_description": "hello",
                "host_id": 22,
                "user_id": "17",
                "join_status": "Approved",
                "createdon": "2019-01-30 23:54:59"
            },
            {
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "219",
                "name": "adnan12345",
                "game_id": 67,
                "event_date": "2018-08-22",
                "event_time": "09:51 AM",
                "seats": "2",
                "home_number": "",
                "zip_code": "58854448",
                "event_description": "Ash test 2",
                "host_id": 22,
                "user_id": "17",
                "join_status": "Approved",
                "createdon": "2019-01-31 00:05:30"
            }
        ]
    }
}
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 


   <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">16) JoinedGamesParticipant</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
                 token,game_id                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
     {
    "status": "SUCCESS",
    "message": "JoinedGamesParticipant Games.",
    "requestKey": "api/JoinedGamesParticipant",
    "data": {
        "JoinedGamesParticipant": [
            {
                "player_type": "host",
                "host_id": "17",
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
                "id": "107",
                "user_id": "17",
                "name": "sonu1",
                "createdon": "2019-02-01 06:05:36"
            },
            {
                "player_type": "player",
                "host_id": "",
                "image": "https://mobulous.app/fametales/public/img/user_signup.png",
                "id": "108",
                "user_id": "18",
                "name": "amit12",
                "createdon": "2019-02-01 06:06:03"
            },
            {
                "player_type": "player",
                "host_id": "",
                "image": "http://mobulous.app/pokkerbuddy/public/userimage/37282d4691a10f43b7fd3d87005827246496.jpg",
                "id": "109",
                "user_id": "22",
                "name": "adnan12345",
                "createdon": "2019-02-01 06:06:55"
            }
        ]
    }
}
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div>                   

<a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">17) ScreenAdds</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
             token                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
            <pre>
   {
    "status": "SUCCESS",
    "message": "Screen Adds.",
    "requestKey": "api/ScreenAdds",
    "data": [
        {
            "image": "http://mobulous.app/pokkerbuddy/public/as.jpg",
            "id": "1",
            "createdon": "2019-01-31 00:00:00"
        }
    ]
}
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div> 

      <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">18) ReportUserdetail</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
             token,id                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
          <pre>
   {
    "status": "SUCCESS",
    "message": "Report User Detail",
    "requestKey": "api/ReportUserdetail",
    "data": {
        "image": "http://mobulous.app/pokkerbuddy/public/userimage/50cd87e4dbb7540ab585baaa261c94e48874.jpg",
        "id": 17,
        "name": "sonu1",
        "host_rank": "",
        "user_rank": "",
        "zip_code": "201301",
        "created_at": "2018-08-07 05:30:06"
    }
}
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div>     
       <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">19) ReportUser</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
             token,report_id,reason                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
          <pre>
  {
    "status": "SUCCESS",
    "message": "User Report successfully",
    "requestKey": "api/ReportUser",
    "data": {
        "user_id": "22",
        "report_id": "17",
        "reason": "hello",
        "updated_at": "2019-01-31 11:49:50",
        "created_at": "2019-01-31 11:49:50",
        "id": 1
    }
}
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div>  
        <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">19) HostRating</span>
      </a>
      <div class="accordion-content">
         <p>devicetype = (android or ios)</p>            
          <p>
              <h5>Parameters: </h5>
              <pre>
             token,host_id,rate,review_msg                         
                </pre>  
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
          <p> <h5>:Brief Description </h5>deviceType: android or ios</p>
          <p> <h5>requestKey: </h5>updatePassword</p>  
          <p> <h5>Sample Response: </h5>
          <pre>
  {
    "status": "SUCCESS",
    "message": "Host Ratedd successfully",
    "requestKey": "api/HostRating",
    "data": {
        "user_id": "22",
        "host_id": "17",
        "rate": "2.5",
        "updated_at": "2019-01-31 13:03:00",
        "created_at": "2019-01-31 13:03:00",
        "id": 2
    }
}
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
          <p> <h5>Notes: </h5></p>
      </div>                   

      <!-- ************************************ forgot password *********************** -->


    <!--   <a href="#" class="accordion-toggle"><span class="toggle-icon"><i class="fa fa-plus-circle"></i></span>
          <span style="margin-left:50px;line-height: 1.5em;">5)  forgot password</span>
      </a>
      <div class="accordion-content"> -->
     <!--  <p>signup_type = normal,amazon,facebook,twitter,gmail</p>
       <p>account_type = saving,current</p>
      <p>payment_method = amazon,paypal,google,credit_debit,apple</p>
    <p>  user_type   = host,foodie  <p>
    <p>notification_status = on,off</p> -->
<!-- 
              <h5>Parameters: </h5>
              <pre>
 email => required
                </pre>
          </p>
          <p> <h5>Response Required: </h5>SUCCESS or FAILURE</p>
         
          <p> <h5>requestKey: </h5>forgotpass</p>
          <p> <h5>Sample Response: </h5>
            <pre>
{
    "status": "SUCCESS",
    "data": {
        "status": "SUCCESS"l
    },
    "message": "Email successfully send",
    "requestKey": "api/forgotpass"
}
            </pre>
          </p>
          <p> <h5>Test Status: </h5></p>
         <p> <h5>Notes: </h5></p>
      </div> -->


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
      $('.accordion-toggle').on('click', function(event){
        event.preventDefault();

        // create accordion variables
        var accordion = $(this);
        var accordionContent = accordion.next('.accordion-content');
        var accordionToggleIcon = $(this).children('.toggle-icon');

        // toggle accordion link open class
        accordion.toggleClass("open");

        // toggle accordion content
        accordionContent.slideToggle(250);

        // change plus/minus icon
        if (accordion.hasClass("open")) {
          accordionToggleIcon.html("<i class='fa fa-minus-circle'></i>");
        } else {
          accordionToggleIcon.html("<i class='fa fa-plus-circle'></i>");
        }
      });
    });
    </script>
    <script type="text/javascript">
    $(document).ready(function () {
      $('ul.nav a').each(function(){
        if(location.href === this.href){
          $(this).addClass('active');
          $('ul.nav a').not(this).removeClass('active');
          return false;
        }
      });
    });
    </script>
</body>
</html>
