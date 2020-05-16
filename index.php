<html>
    <head>
    <title>CodeBook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
             background-image: url("image.jpg");
            background-repeat: no-repeat;
            background-size: cover;  
        }  
        #head{
            color: white;
            opacity: 0.8;
            font-size: 7vw;
            text-align: center;
            margin-bottom: 0px;
            padding-bottom: 0px;
        } 
        #subhead{
            margin-top: 0px;
            padding-top: 0px;
            padding-top: 3%;
            padding-bottom: 4%;
            float: up;
            color: white;
            opacity: 0.5;
            font-size: 2vw;
            text-align: center;
        } 
        .container{
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        input{
            background: white;
            opacity :0.6;
        }
        span{
            color: greenyellow;
            opacity:0.8;
        }
        label{
            color:white;
        }
        .col1 ,.col2{
            width: 47%;

            float: left;
        }
        .col1{
            padding-right: 6%; 
        }
        .row{
            padding-bottom: 2%;
        }
        input[type=text], input [type=checkbox] ,input[type=password]
        {
            width: 100%;
            font-size:20px;
            padding: 14px;
            border: 1px solid green;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
            cursor: text;
        }
        .row:after 
        {
            content: "";
            display: table;
            clear: both;
        }
        input[type=submit] {
        opacity: 1;
        background-color: green;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor:pointer;
        width: 100%;
        }
        #error{
            color: white;
        }
        @media screen and (max-width: 600px) 
        {
            .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
        }
}
    </style>
    <?php
        $error = $fname= $lname=$email="";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $email=$_POST["email"];
            if ($_POST["password"]==$_POST["confirm-password"]){
                $error=$_POST["fname"].", you have been succesfully registered with email address ".$_POST["email"].".";
                // $error = $fname= $lname=$email="";
            }
            else {
                $error="Password and Confirm Password should be same.";
            }
        }
    ?>
    </head>
    <body>
        <div class="container">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div id ="head">Register</div>
                <div id ="subhead">Create your account. It's free and only takes a minute.</div>
                <div class="row">
                    <div class="col1">
                        <input type="text" id="fname" name="fname" placeholder="First Name" autofocus  required pattern="[a-zA-Z]+" value= "<?php echo $fname;?>" >
                    </div>
                    <div class="col2">
                        <input type="text" id="lname" name="lname" placeholder="Last Name" pattern="[a-zA-Z]+" required value= "<?php echo $lname;?>" >
                    </div>
                </div>
                <div class="row">
                    <input type="text" id ="email" name="email" placeholder="Email" required  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value= "<?php echo $email;?>" >
                </div>
                <div class="row">
                    <input type="password" id ="password" name="password" placeholder="Password" required>
                </div>
                <div class="row">
                    <input type="password" id ="confirm-password" name="confirm-password" placeholder="Confirm Password"  required >
                </div>
                <div class="row">
                    <input type="checkbox" id ="terms" name="terms" value = "yes" required>
                    <label for="accept">I accept the <span >Terms of Use</span>  &  <span >Privacy Policy</span>. </label>
                </div>
                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
            <div id=error><?php echo $error ; ?></div>
        </div>
    </body>
</html>