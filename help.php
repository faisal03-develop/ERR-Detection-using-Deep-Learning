<?php
require('connection.php');
session_start();
if(isset($_COOKIE['username_email']) && isset($_COOKIE['password'])){
    $id=$_COOKIE['username_email'];
    $pass=$_COOKIE['password'];
}
else{
    $id="";
    $pass="";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="img" href="/err/pictures/Logo_favicon@300x.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/err/style_home_page.css">
    <link rel="stylesheet" href="/err/help.css">
    <title>Help</title>
</head>
<body>
    <header>
        <div id="header">
        <img id="logo" src="/err/pictures/logo@300x.png" height="60rem">
        <div id="header_options">
            <a href="/err/index.php">Home</a>
            <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
                echo"
            <a href='/err/records.php'>Record</a>
                ";
            }
            else{
                echo"
            <a onclick=\"popup('login-popup')\">Record</a>
                ";
            }
            
            ?>

            <a href="/err/resources.php">Resources</a>
            <a href="/err/about.php">About</a>
            <a href="/err/records_2.php">Help</a>
            <?php
                if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
                    echo"<a href='logout.php' style='background-color:transparent; border:none;'>Log-Out<i class='fa-solid fa-user' style='margin-left:7px'></i></a>";
                }
                else{
                    echo"
                    <a style='cursor:pointer;' onclick=\"popup('login-popup')\">Log-In <i class='fa-solid fa-user' style='margin-left: 7px;'></i></a>    
                    ";
                }
            ?>
        </div>
        </div>
    </header>
    
    <div class="top_content">
        <h1>Need Help?</h1>
        <span>You will get all the help you need on this page</span>
        <h2>User Guide</h2>
        
    </div>
    <div class="card_container">

  <!-- Card-1 -->   
        
  <div class="card">
    Want to make some tests?
    <div class="card__content">
      <p class="card__title">Getting Started</p>
      <p class="card__description">You can click on the "Get Started" button on the "Home" page.Upload the image and click the button  to get the process started.</p>
    </div>
  </div> 

<!-- Card-2 -->
        <div class="card">
            Adding Patient Records
            <div class="card__content">
              <p class="card__title">Adding Records</p>
              <p class="card__description">Navigate to the "Records" page and fill out the form with accurate details and hit the upload button to save the reocrds. Ypu can view your uploaded records on the records page</p>
            </div>
          </div>

<!-- Card-3 -->

<div class="card">
    Editing Records
    <div class="card__content">
      <p class="card__title">Editing Records</p>
      <p class="card__description">Locate the record in the table and click the "Edit" button to update details.</p>
    </div>
  </div>


</div>

<!-- FAQs -->
<div class="faq_container">
    <div class="faq-header">Frequently Asked Questions</div>

    <div class="faq-content">
      <div class="faq-question">
        <input id="q1" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q1" class="panel-title">What is ERR?</label>
        <div class="panel-content">ERR (External Root Resorption) is a dental condition where the root surface is progressively lost.</div>
      </div>
      
      <div class="faq-question">
        <input id="q2" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q2" class="panel-title">What is the purpose of this application?</label>
        <div class="panel-content">This application helps identify and classify External Root Resorption (ERR) using CBCT scans and advanced AI models.</div>
      </div>
      
      <div class="faq-question">
        <input id="q3" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q3" class="panel-title">What ERR depths does the system classify?</label>
        <div class="panel-content">The system classifies depths as: 0.5mm ,1mm, 2mm and None (No ERR detected)
            </div>
      </div>

      <div class="faq-question">
        <input id="q4" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q4" class="panel-title">How does the AI make predictions?</label>
        <div class="panel-content">The AI analyzes CBCT scan features using pre-trained deep learning models and classifies ERR depths based on training data.
        </div>
      </div>

      <div class="faq-question">
        <input id="q5" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q5" class="panel-title">What file formats are supported for CBCT scans?</label>
        <div class="panel-content">Only DICOM format is supported.</div>
      </div>
    </div>
</div>

<!-- Troubleshooting -->
 
<div class="faq_container trouble_con">
    <div class="faq-header">Troubleshooting</div>

    <div class="faq-content">
      <div class="faq-question">
        <input id="q1" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q1" class="panel-title">Error Adding Records</label>
        <div class="panel-content">Ensure all required fields are filled.</div>
      </div>
      
      <div class="faq-question">
        <input id="q2" type="checkbox" class="panel">
        <div class="plus">+</div>
        <label for="q2" class="panel-title">Data Not Displaying</label>
        <div class="panel-content">Check your database connection settings in the configuration file.</div>
      </div>
      
    </div>
</div>

            <div class="contant_us top_content">
                <h3>Contact Us:</h3>
                <span>You can contact us at <a href="mailto:altaffaisal573@gmail.com">Gmail</a></span>
            </div>

<footer>
        <div class="foot_block footer_help">
            <div class="foot_content">
                <div class="content_left">
                    <img src="/err/pictures/logo@300x.png" height="50rem">
                    <i class="fa-solid fa-copyright" id="c_icon"></i><span style="font-size: 0.8rem;">all rights reserved</span>
                </div>
                <!-- <div class="content_center">
                    <i style="margin-right: 3px;" class="fa-solid fa-pen-nib"></i><span>Designed by: <b>Faisal Altaf</b></span>
                </div> -->
                
                <div class="content_right">
                <div class="footer_card">
                        <a class="socialContainer containerOne" href="#">
                            <svg viewBox="0 0 16 16" class="socialSvg instagramSvg">
                            <path
                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"
                            ></path>
                            </svg>
                        </a>

                        <a class="socialContainer containerTwo" href="#">
                            <svg viewBox="0 0 16 16" class="socialSvg twitterSvg">
                            <path
                                d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"
                            ></path>
                            </svg>
                        </a>

                        <a class="socialContainer containerThree" href="#">
                            <svg viewBox="0 0 448 512" class="socialSvg linkdinSvg">
                            <path
                                d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"
                            ></path>
                            </svg>
                        </a>

                        <a class="socialContainer containerFour" href="#">
                            <svg viewBox="0 0 16 16" class="socialSvg whatsappSvg">
                            <path
                                d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"
                            ></path>
                            </svg>
                        </a>
                        </div>

                <a href="https://www.termsfeed.com/live/5711953b-2bce-43a4-9dcc-4c6851b7d0f1" target="_blank"><i style="margin-right: 3px;" class="fa-regular fa-file"></i><span>Privacy Policy</span></a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>