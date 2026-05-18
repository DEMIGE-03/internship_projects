<?php include 'includes/header.php'; ?>

<div class="main-container">

   <?php include 'includes/sidebar.php'; ?>

   <div class="content-area">
      <div>
         <h1 style="text-align:center;">Contact Us</h1>
      </div>

      <div class="contact">
         <div>
            🏤<h4>Head Office</h4>
            Masaki avenue 3<sup>rd</sup> road, Mji Mwema<br>
            Dar-es Salaam-Tanzania
         </div>

         <div>
            📩<h4>Email Support</h4>
            <a href="#">EMPhelpdesk@yahoo.go.tz</a><br>
            <a href="#">Empower@gmail.com</a>
         </div>

         <div>
            ☎️ <h4>Let's talk</h4>
                phone:+255 234 567 890,<br>
                Fax: +6221 45609 8726
         </div>

         <div>
            🕐<h4>Working Hours</h4>
               Monday-Friday<br>
               0800-1800hrs
         </div>
      </div>
      <div class="contact-form">
         <form action="" method="post">
            <div class="field-grid">
               <label for="name">Name:</label>
               <input type="text" id="name" Placeholder="Enter your Name....."><br>
            </div>

            <div class="field-grid">
               <label for="email">Email:</label>
               <input type="email" id="email" placeholder="Enter your Email..." required><br>
            </div>

            <div class="field-grid">
               <label for="contact">Contacts:</label>
               <input type="tel" name="contact" placeholder="eg +234 567 890"><br>
            </div>
            <div class="field-grid">
               <label for="comments">Message:</label><br>
               <textarea name="comment" rows="9" cols="30" placeholder="Enter your comments here for more support help from our team......"></textarea><br>
            </div>

            <button type="submit" style="cursor:pointer; border-radius:5px; padding: 0 3px; height:30px; color:ccccdd;">Submit Message</button>  
         </form>
      </div>
   </div>

   </div>

</div>

<?php include 'includes/footer.php'; ?>