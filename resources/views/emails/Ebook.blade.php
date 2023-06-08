<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SFGHB</title>
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
        color: red;
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
        color: red;
        font-weight: 600;
        display: inline-block;
        margin: auto 3px;
        font-size: 16px;
      }

      .text-3 {
        margin-top: 50px;
      }

      .text-4 {
        margin-top: 40px;
      }
    </style>
  </head>
  <body>
    <div id="header">
      <img height="50" width="150" src="https://www.sfghb.org/assets/img/sfghb.png" alt="SFGHB">
    </div>
    <div id="content">
        <div class="text-1">New Purchase Request from SFGHB Customer.</div>
        <div class="text-3">
            With the Information provided below you can contact the customer to get more information about the book they want how to deliver the book to them.
          </div>
        <div class="text-4">
          Customer Name: {{ $compose['name'] }}<br>
          Customer Email: {{ $compose['email'] }}<br>
          Customer Phone: {{ $compose['email'] }}
        </div>

    </div>
    <div id="footer">
        <div class="link">
          <a href="https://www.sfghb.org">sfghb.com</a>
        </div>
    </div>

  </body>
  </html
