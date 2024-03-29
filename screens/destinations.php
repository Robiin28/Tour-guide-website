<?php include('../config/constant.php'); ?>
<?php include('login-check.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations</title>
    <link rel="shortcut icon" type="image/x-icon" href="/assets/icons/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href=" ../css/destinations.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/contact-us.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>
<div class="navbar">
        <div class="nav-bar-components">
            <a href="/index.html">
              <div class="comp-logo">
                  <svg width="83" height="90" viewBox="0 0 83 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path
                          d="M0 59.1815C0 51.8507 1.3356 45.8768 4.00681 41.2598C8.64432 33.1184 15.1183 29.0477 23.4287 29.0477C28.2517 29.0477 32.3698 30.898 35.783 34.5987V11.0732L46.3565 6.31522H46.913V59.1815C46.913 66.5122 45.5774 72.4861 42.9062 77.1031C38.1945 85.2445 31.702 89.3152 23.4287 89.3152C15.2667 89.3152 8.79272 85.2445 4.00681 77.1031C1.3356 72.5566 0 66.5827 0 59.1815ZM11.13 59.1815C11.13 65.8074 11.8906 70.5301 13.4117 73.3496C15.9345 78.0018 19.2735 80.328 23.4287 80.328C27.621 80.328 30.96 78.0018 33.4457 73.3496C35.0039 70.4243 35.783 65.7016 35.783 59.1815C35.783 52.6613 35.0039 47.9386 33.4457 45.0133C30.9971 40.3963 27.6581 38.0878 23.4287 38.0878C19.1993 38.0878 15.8603 40.4316 13.4117 45.119C11.8906 48.0443 11.13 52.7318 11.13 59.1815Z"
                          fill-opacity="1" />
                      <path
                          d="M57.1913 83V32.3648L46.913 37V28.5L57.1913 23.4906V4.69811L67.9214 0H68.4861V22.5L81.2421 28.5L83 24.0126L78.5 35.5L68.4861 31V78.3019L57.7561 83H57.1913Z"
                          fill-opacity="1" />
                  </svg>
              </div>
            </a>
            <div class="tab-container">
                <ul class="tabs">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="booking.php">Booking</a></li>
                    <li><a href="destinations.php"id="selected" >Destinations</a></li>
                    <li><a href="about-us.php" >About Us</a></li>
                    <li><a href="contact-us.php" >Contact Us</a></li>
                    <li><a href="logout.php">LOG OUT</a></li>
                </ul>
            </div>
        </div>
           
    </div>
    <div class="background">
    <img src="../assets/images/Axum-2.jpg" alt="for desetinus" class="background-img">
            <div class="about-container">
                <h1 class="text-one">Destination</h1>
            </div>
   </div>  
    <!-- Destination page -->
    <div class="container-destination">
       <div class="move"> 
        <h1 class="light">
            make the light
        </h1>
        <h1 class="text-move">
            move.
        </h1>
       </div>
       <div class="more"> 
        <h1 class="text-more">
            more
        </h1>
        <h1 class="text-destinations">
            destinations
        </h1>
        <h1 class="text-description">
            Your peace of mind doesn't 
            have to be tied to where everyone else is.</br>
            We have a good number of travel and relocation
            destinations. Take </br>your time and find the perfect
            one for you<br> Go to <a href="booking.php" style="color:red;">booking page</a> to find more and get the details. 

        </h1>
       </div>
       <div class="sidebar"> </div>
       <div class="content1"> 

       </div>
       <div class="content2"> the content2 part</div>
       <div class="content3">
             
      </div>
       <div class="sidebar2"> </div>
       <div class="content4"> </div>
       <div class="content5"> </div>
       <div class="content6"> t</div>
       <div class="sidebar3"> </div>
       <div class="content7"> </div>
       <div class="content8"> </div>
       <div class="content9"> </div>
    </div>
   
    <!-- this is for footer -->
    <div class="pg-footer">
               <footer class="footer">
                 <svg viewBox="0 0 120 28">
                   <defs>
                     <filter id="goo">
                       <feGaussianBlur in="SourceGraphic" stdDeviation="2" result="blur" />
                       <feColorMatrix in="blur" mode="matrix" values="
                                   1 0 0 0 0  
                                   0 1 0 0 0  
                                   0 0 1 0 0  
                                   0 0 0 13 -9" result="goo" />
                       <feBlend in="SourceGraphic" in2="goo" />
                     </filter>
                     <path id="wave"
                       d="M 0,10 C 30,10 30,15 60,15 90,15 90,10 120,10 150,10 150,15 180,15 210,15 210,10 240,10 v 28 h -240 z" />
                   </defs>
                   <use id="wave3" class="wave" xlink:href="#wave" x="0" y="-2"></use>
                   <use id="wave2" class="wave" xlink:href="#wave" x="0" y="0"></use>
                 </svg>
                 <div class="footer-content">
                  <div class="footer-content-column">
                    <div class="footer-logo-container">
                      <div class="footer-logo">
                        <a class="footer-logo-link" href="#">
                          <div class="namelogo">
                            <svg width="83" height="90" viewBox="0 0 83 90" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path
                                d="M0 59.1815C0 51.8507 1.3356 45.8768 4.00681 41.2598C8.64432 33.1184 15.1183 29.0477 23.4287 29.0477C28.2517 29.0477 32.3698 30.898 35.783 34.5987V11.0732L46.3565 6.31522H46.913V59.1815C46.913 66.5122 45.5774 72.4861 42.9062 77.1031C38.1945 85.2445 31.702 89.3152 23.4287 89.3152C15.2667 89.3152 8.79272 85.2445 4.00681 77.1031C1.3356 72.5566 0 66.5827 0 59.1815ZM11.13 59.1815C11.13 65.8074 11.8906 70.5301 13.4117 73.3496C15.9345 78.0018 19.2735 80.328 23.4287 80.328C27.621 80.328 30.96 78.0018 33.4457 73.3496C35.0039 70.4243 35.783 65.7016 35.783 59.1815C35.783 52.6613 35.0039 47.9386 33.4457 45.0133C30.9971 40.3963 27.6581 38.0878 23.4287 38.0878C19.1993 38.0878 15.8603 40.4316 13.4117 45.119C11.8906 48.0443 11.13 52.7318 11.13 59.1815Z"
                                fill="white" fill-opacity="1" />
                              <path
                                d="M57.1913 83V32.3648L46.913 37V28.5L57.1913 23.4906V4.69811L67.9214 0H68.4861V22.5L81.2421 28.5L83 24.0126L78.5 35.5L68.4861 31V78.3019L57.7561 83H57.1913Z"
                                fill="white" fill-opacity="1" />
                            </svg>
                            <h1 class="company-name">RHO Tour</h1>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="footer-content-column">
                    <div class="footer-menu">
                      <h2 class="footer-menu-name"> Company</h2>
                      <ul id="menu-company" class="footer-menu-list">
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                          <a href="contact-us.php" data-replace="Contact Us"><span>Contact Us</span></a>
                        </li>
                        <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                          <a href="destinations.php" data-replace="Destinations"><span>Destinations</span></a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                          <a href="booking.php" data-replace="Booking"><span>Booking</span></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="footer-content-column">
                    <div class="footer-menu">
                      <h2 class="footer-menu-name"> Quick Links</h2>
                      <ul id="menu-quick-links" class="footer-menu-list">
                        <li class="menu-item menu-item-type-custom menu-item-object-custom">
                          <a href="../index.php" data-replace="Home"><span>Home</span></a>
                        </li>
                        <li class="menu-item menu-item-type-custom menu-item-object-custom">
                          <a href="about-us.php" data-replace="About Us"><span>About Us</span></a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                          <a href="contact-us.php" data-replace="Contact Us"><span>Contact Us</span></a>
                        </li>
                        <li class="menu-item menu-item-type-post_type menu-item-object-page">
                          <a href="destinations.php" data-replace="Destinations"><span>Destinations</span></a>
                        </li>
                        <li class="menu-item menu-item-type-post_type_archive menu-item-object-customer">
                          <a href="booking.php" data-replace="Booking"><span>Booking</span></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="footer-content-column">
                    <div class="footer-call-to-action">
                      <div class="footer-call-to-action-chat">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M3.05002 10.0151C2.79178 9.30708 2.94668 8.48233 3.51474 7.91427L9.8787 1.55031C11.0503 0.378738 12.9498 0.378738 14.1213 1.55031L20.4853 7.91427C21.0534 8.48239 21.2083 9.30727 20.9499 10.0154C20.9824 10.1139 20.9999 10.2191 20.9999 10.3285V21.3285C20.9999 22.4331 20.1045 23.3285 18.9999 23.3285H4.99994C3.89537 23.3285 2.99994 22.4331 2.99994 21.3285V10.3285C2.99994 10.219 3.01752 10.1137 3.05002 10.0151ZM4.92896 9.32848L11.2929 2.96452C11.6834 2.574 12.3166 2.574 12.7071 2.96452L19.0711 9.32848H19.0408V9.3588L12.7071 15.6924C12.3166 16.083 11.6834 16.083 11.2929 15.6924L4.92896 9.32848ZM18.9999 12.2281L14.1213 17.1067C12.9498 18.2782 11.0503 18.2782 9.8787 17.1067L4.99994 12.2279L4.99994 21.3285H18.9999V12.2281Z"
                            fill="currentColor" />
                        </svg>
                        <h2 class="footer-call-to-action-title"> Let's Chat</h2>
                      </div>
                      <p class="footer-call-to-action-description"> Have a support question?</p>
                      <a class="footer-call-to-action-button button" href="contact-us.php" > Get in Touch </a>
                    </div>
                    <div class="footer-call-to-action">
                      <div class="footer-call-to-action-chat">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M22 12C22 10.6868 21.7413 9.38647 21.2388 8.1731C20.7362 6.95996 19.9997 5.85742 19.0711 4.92896C18.1425 4.00024 17.0401 3.26367 15.8268 2.76123C14.6136 2.25854 13.3132 2 12 2V4C13.0506 4 14.0909 4.20703 15.0615 4.60889C16.0321 5.01099 16.914 5.60034 17.6569 6.34326C18.3997 7.08594 18.989 7.96802 19.391 8.93848C19.7931 9.90918 20 10.9495 20 12H22Z"
                            fill="currentColor" />
                          <path
                            d="M2 10V5C2 4.44775 2.44772 4 3 4H8C8.55228 4 9 4.44775 9 5V9C9 9.55225 8.55228 10 8 10H6C6 14.4182 9.58173 18 14 18V16C14 15.4478 14.4477 15 15 15H19C19.5523 15 20 15.4478 20 16V21C20 21.5522 19.5523 22 19 22H14C7.37259 22 2 16.6274 2 10Z"
                            fill="currentColor" />
                          <path
                            d="M17.5433 9.70386C17.8448 10.4319 18 11.2122 18 12H16.2C16.2 11.4485 16.0914 10.9023 15.8803 10.3928C15.6692 9.88306 15.3599 9.42017 14.9698 9.03027C14.5798 8.64014 14.1169 8.33081 13.6073 8.11963C13.0977 7.90869 12.5515 7.80005 12 7.80005V6C12.7879 6 13.5681 6.15527 14.2961 6.45679C15.024 6.7583 15.6855 7.2002 16.2426 7.75732C16.7998 8.31445 17.2418 8.97583 17.5433 9.70386Z"
                            fill="currentColor" />
                        </svg>
                        <h2 class="footer-call-to-action-title">Call Us</h2>
                      </div>
                      <p class="footer-call-to-action-link-wrapper"> <a class="footer-call-to-action-link"
                          href="tel:+251 964485489" target="_self"> +251-964485489 </a></p>
                    </div>
                  </div>
                  <div class="footer-social-links"> <svg class="footer-social-amoeba-svg" xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 236 54">
                      <path class="footer-social-amoeba-path"
                        d="M223.06,43.32c-.77-7.2,1.87-28.47-20-32.53C187.78,8,180.41,18,178.32,20.7s-5.63,10.1-4.07,16.7-.13,15.23-4.06,15.91-8.75-2.9-6.89-7S167.41,36,167.15,33a18.93,18.93,0,0,0-2.64-8.53c-3.44-5.5-8-11.19-19.12-11.19a21.64,21.64,0,0,0-18.31,9.18c-2.08,2.7-5.66,9.6-4.07,16.69s.64,14.32-6.11,13.9S108.35,46.5,112,36.54s-1.89-21.24-4-23.94S96.34,0,85.23,0,57.46,8.84,56.49,24.56s6.92,20.79,7,24.59c.07,2.75-6.43,4.16-12.92,2.38s-4-10.75-3.46-12.38c1.85-6.6-2-14-4.08-16.69a21.62,21.62,0,0,0-18.3-9.18C13.62,13.28,9.06,19,5.62,24.47A18.81,18.81,0,0,0,3,33a21.85,21.85,0,0,0,1.58,9.08,16.58,16.58,0,0,1,1.06,5A6.75,6.75,0,0,1,0,54H236C235.47,54,223.83,50.52,223.06,43.32Z">
                      </path>
                    </svg>
                    <a class="footer-social-link facebook" href="#" target="_blank">
                      <span class="hidden-link-text">Facebook</span>
                      <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                        <path class="footer-social-icon-path"
                          d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                        </path>
                      </svg>
                    </a>
                    <a class="footer-social-link twitter" href="#" target="_blank">
                      <span class="hidden-link-text">Twitter</span>
                      <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
                        <path class="footer-social-icon-path"
                          d="M 25.855469 5.574219 C 24.914063 5.992188 23.902344 6.273438 22.839844 6.402344 C 23.921875 5.75 24.757813 4.722656 25.148438 3.496094 C 24.132813 4.097656 23.007813 4.535156 21.8125 4.769531 C 20.855469 3.75 19.492188 3.113281 17.980469 3.113281 C 15.082031 3.113281 12.730469 5.464844 12.730469 8.363281 C 12.730469 8.773438 12.777344 9.175781 12.867188 9.558594 C 8.503906 9.339844 4.636719 7.246094 2.046875 4.070313 C 1.59375 4.847656 1.335938 5.75 1.335938 6.714844 C 1.335938 8.535156 2.261719 10.140625 3.671875 11.082031 C 2.808594 11.054688 2 10.820313 1.292969 10.425781 C 1.292969 10.449219 1.292969 10.46875 1.292969 10.492188 C 1.292969 13.035156 3.101563 15.15625 5.503906 15.640625 C 5.0625 15.761719 4.601563 15.824219 4.121094 15.824219 C 3.78125 15.824219 3.453125 15.792969 3.132813 15.730469 C 3.800781 17.8125 5.738281 19.335938 8.035156 19.375 C 6.242188 20.785156 3.976563 21.621094 1.515625 21.621094 C 1.089844 21.621094 0.675781 21.597656 0.265625 21.550781 C 2.585938 23.039063 5.347656 23.90625 8.3125 23.90625 C 17.96875 23.90625 23.25 15.90625 23.25 8.972656 C 23.25 8.742188 23.246094 8.515625 23.234375 8.289063 C 24.261719 7.554688 25.152344 6.628906 25.855469 5.574219 ">
                        </path>
                      </svg>
                    </a>
                    <a class="footer-social-link youtube" href="#" target="_blank">
                      <span class="hidden-link-text">Youtube</span>
                      <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                        <path class="footer-social-icon-path"
                          d="M 15 4 C 10.814 4 5.3808594 5.0488281 5.3808594 5.0488281 L 5.3671875 5.0644531 C 3.4606632 5.3693645 2 7.0076245 2 9 L 2 15 L 2 15.001953 L 2 21 L 2 21.001953 A 4 4 0 0 0 5.3769531 24.945312 L 5.3808594 24.951172 C 5.3808594 24.951172 10.814 26.001953 15 26.001953 C 19.186 26.001953 24.619141 24.951172 24.619141 24.951172 L 24.621094 24.949219 A 4 4 0 0 0 28 21.001953 L 28 21 L 28 15.001953 L 28 15 L 28 9 A 4 4 0 0 0 24.623047 5.0546875 L 24.619141 5.0488281 C 24.619141 5.0488281 19.186 4 15 4 z M 12 10.398438 L 20 15 L 12 19.601562 L 12 10.398438 z">
                        </path>
                      </svg>
                    </a>
                    <a class="footer-social-link instagram" href="#" target="_blank">
                      <span class="hidden-link-text">Github</span>
                      <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path class="footer-social-icon-path"
                          d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                        </path>
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="footer-copyright">
                  <div class="footer-copyright-wrapper">
                    <p class="footer-copyright-text">
                      <a class="footer-copyright-link" href="#" target="_self"> ©2023 | Developed By: RHO</a>
                    </p>
                  </div>
                </div>
                 </footer>
                 </div>
                      <script type="text/javascript" src="./js/main/script.js"></script>
    </div>

</body>

</html>