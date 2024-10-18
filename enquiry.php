<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $subject = 'Sowparnika Enquiry';
        $message = '';
         $project = htmlspecialchars($_POST['project']);

        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        //$to = "itssanathsb@gmail.com"; // Updated recipient email
$to = "hello@infideck.com,support@extrememedia.in";
        $email_subject = $subject;
        $txt = "You have a new message<br>=============================<br>" . 
               "Name: " . $name . "<br>Phone: " . $phone . "<br>Email: " . $email . "<br>Project: " . $project . "<br>Message:<br>" . $message ;

       /* $headers = 'From: info@emserver.in' . "\r\n" .
                   "Reply-To: " . $email . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();*/
                   $headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <hello@infideck.com>' . "\r\n";
$headers .= 'Bcc: digitalmarketing@extrememedia.in' . "\r\n";

        if (mail($to, $email_subject, $txt, $headers)) {
           $msg="Enquiry Sent Successfully";
            // Optionally, redirect to a thank you page
             //header("Location: thank_you.html");
             //exit();
        } else {
            $msg="Enquiry Sending Failed";
        }
        
        
        
        
// Get form data
$pageurl = isset($_POST['project']) ? $_POST['project'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$mobile = isset($_POST['phone']) ? $_POST['phone'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
//$city = isset($_POST['city']) ? $_POST['city'] : '';
$project = isset($_POST['project']) ? $_POST['project'] : '';
$message = isset($_POST['message']) ? $_POST['message'] : '';
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';

// Initialize projectid and srd
$projectid = '';
$srd = '';

// Check project URL and assign project ID and SRD
if (($project != '' && $project == "West Holmes")) {
    $projectid = '63de1db48eb6d84198d15a68';
    $srd = '654ddb5ba3d855bac081cff5';
}
if(($project !='' && $project == "Yara")){
		$projectid='63de1d528eb6d8410cd161e6';
		$srd='654ddb38a3d8555912ad636e';
	}
	if(($project !='' && $project == "Signature Tower")){
		$projectid='64d1143a398c9e29be562447';
		$srd='654ddb79a3d85554bd469f43';
	}
	if(($project !='' && $project == "Capital county")){
		$projectid='64d113c8398c9e29be562437';
		$srd='654ddb940d18518cbed3447b';
	}
	if(($project !='' && $project == "Ista")){
		$projectid='64d11401398c9e29be562445';
		$srd='654ddbaaa3d855bac081d034';
	}
	if(($project !='' && $project == "Elania")){
		$projectid='649941acc364e7194efb6b15';
		$srd='6656da8e735dafadd1e1f92d';
	}
if(($project !='' && $project == "Natura")){		$projectid='63de20318eb6d80e6a56813a';
		$srd='665703fca3d855ecd18773fb';
	}
if(($project !='' && $project == "Edifice")){		$projectid='63de1ee68eb6d878276f15e1';
		$srd='665703fca3d855ecd18773fb';
	}
/*	if($pageurl=='/projects/seychelles-flats-sreekaryam-trivandrum/'){
		$projectid='63de1e138eb6d84198d15a8b';
		$srd='665703fca3d855ecd18773fb';
	}
	if($pageurl=='/projects/navarathinam-pearl-apartments-pappanamcode-trivandrum/'){
		$projectid='63de1cb28eb6d828a21450dc';
		$srd='665703fca3d855ecd18773fb';
	}
	if($pageurl=='/projects/jazzmyna-flats-kunnamangalam-calicut/'){
		$projectid='63de20978eb6d878276f16c8';
		$srd='665703fca3d855ecd18773fb';
	}*/
	if(($project !='' && $project == "Bhavani")){
		$projectid='63de1e838eb6d84129d15ead';
		$srd='665703fca3d855ecd18773fb';
	}
if(($project !='' && $project == "Atrium")){
		$projectid='63de1f5d8eb6d84129d15ee9';
		$srd='665703fca3d855ecd18773fb';
	}
// Add all other conditions similarly
// ...

// Prepare the lead data
$leaddata = array(
    "sell_do" => array(
        "analytics" => array("utm_content" => '', "utm_term" => '', "utm_source" => ''),
        "campaign" => array("srd" => $srd),
        "form" => array(
            "requirement" => array("property_type" => "flat"),
            "custom" => array(),
           // "address" => array("city" => $city),
            "note" => array("content" => $message),
            "lead" => array("name" => $name, "phone" => $mobile, "email" => $email, "project_id" => $projectid)
        )
    ),
    "api_key" => '844ccd3b560cc99216aa28e532e7b47d'
);

// Initialize cURL
$ch = curl_init('https://app.sell.do/api/leads/create.json');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($leaddata));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Execute the cURL request and get the response
$response = curl_exec($ch);
curl_close($ch);

// Handle the response (you can log it or use it as needed)
// echo "<pre>"; print_r(json_decode($response)); echo "</pre>";


    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Thank You</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <style>
  *{
  box-sizing:border-box;
 /* outline:1px solid ;*/
}
body{
background: #ffffff;
background: linear-gradient(to bottom, #ffffff 0%,#e1e8ed 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e1e8ed',GradientType=0 );
    height: 100%;
        margin: 0;
        background-repeat: no-repeat;
        background-attachment: fixed;
  
}

.wrapper-1{
  width:100%;
  height:100vh;
  display: flex;
flex-direction: column;
}
.wrapper-2{
  padding :30px;
  text-align:center;
}
h1{
    font-family: 'Kaushan Script', cursive;
  font-size:4em;
  letter-spacing:3px;
  color:#ed1c24 ;
  margin:0;
  margin-bottom:20px;
}
.wrapper-2 p{
  margin:0;
  font-size:1.3em;
  color:#aaa;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.go-home{
  color:#fff;
  background:#ed1c24 ;
  border:none;
  padding:10px 50px;
  margin:30px 0;
  border-radius:30px;
  text-transform:capitalize;
  box-shadow: 0 10px 16px 1px rgba(174, 199, 251, 1);
}
.footer-like{
  margin-top: auto; 
  background:#D7E6FE;
  padding:6px;
  text-align:center;
}
.footer-like p{
  margin:0;
  padding:4px;
  color:#5892FF;
  font-family: 'Source Sans Pro', sans-serif;
  letter-spacing:1px;
}
.footer-like p a{
  text-decoration:none;
  color:#58ff9e;
  font-weight:600;
}

@media (min-width:360px){
  h1{
    font-size:4.5em;
  }
  .go-home{
    margin-bottom:20px;
  }
}

@media (min-width:600px){
  .content{
  max-width:1000px;
  margin:0 auto;
}
  .wrapper-1{
  height: initial;
  max-width:620px;
  margin:0 auto;
  margin-top:50px;
  box-shadow: 4px 8px 40px 8px rgba(88, 146, 255, 0.2);
}
  
}
    </style>
</head>
<body>

    <div class=content>
        <div class="wrapper-1">
          <div class="wrapper-2">
            <h1>Thank you !</h1>
            <p><?php echo $msg;?> </p>
           
<a href="https://emserver.in/sowparnika"></a><button class="go-home">
            go home
            </button></a>
          </div>
          <div class="footer-like">
            <!-- <p>Email not received?
            <a href="#">Click here to send again</a> -->
            </p>
          </div>
      </div>
    </div>
      
      
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">
</body>
</html>


