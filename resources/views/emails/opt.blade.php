<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Email Template</title>
    <style>
      /* Define styles for the template */
      body {
        font-family: Arial, sans-serif;
        background-color: #ffffff;
        margin: 0;
        padding: 0;
      }

      #header {
        text-align: center;
        padding: 20px 0;
        margin-top: 10px;
      }

      #header img {
        max-width: 100%;
        height: auto;
      }

      #content {
        background-color: #ffffff;
        padding: 20px;
        text-align: center;
      }

      #content .text-1, .text-2 {
        color: #BE0807;
        font-weight: 600;
        font-size: 18px;
      }

      .text-2 {
        font-size: 24px;
        margin-top: 15px;
      }

      #footer {
        margin: 40px auto;
        padding: 10px;
        text-align: center;
      }


      .icons {
        margin-bottom: 20px;
      }

      .icons a {
        color: #BE0807;
        font-weight: 600;
        display: inline-block;
        margin: auto 3px;
        font-size: 16px;
      }

      .text-3 {
        margin-top: 40px;
      }

      .text-4 {
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <div id="header" style="margin-top: 20px">
      <img height="60" width="60" src="https://www.sfghb.org/assets/img/sfghb.png" alt="Company Logo">
    </div>
    <div id="content">
        <div class="text-1">Your SFGHB Verification Code:</div>
        <div class="text-2">{{ $compose['pin'] }}</div>

        <div class="text-3">
          Please use the verification code provided to verify your email address.
        </div>

        <div class="text-4">
          If you did not create an account with SFGHB, no further action is required.
        </div>
    </div>
    <div id="footer">
        <div class="icons">
            <a href="#">
              <img height="40" width="40" src="https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-facebook-social-media-icon-png-image_6315968.png" alt="facebook">
            </a>
            <a href="#">
              <img height="40" width="40" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/2048px-Instagram_icon.png" alt="Instagram">
            </a>
            <a href="#">
              <img height="40" width="40" src="https://png.pngtree.com/png-vector/20221018/ourmid/pngtree-twitter-social-media-round-icon-png-image_6315985.png" alt="Twitter">
            </a>
          </div>

        <div class="link">
          <a href="https://www.sfiloveinaction.org">sfiloveinaction.org</a>
        </div>
    </div>

  </body>
  </html
