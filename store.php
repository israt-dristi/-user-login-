<?php  
 $message = '';  
 $error = '';  
 if(isset($_POST["submit"]))  
 {  
      if(empty($_POST["name"]))  
      {  
           $error = "<label class='text-danger'>Enter Name</label>";  
      }  
      
      else if(empty($_POST["email"]))  
      {  
           $error = "<label class='text-danger'>Enter email</label>";  
      } else if(empty($_POST["uname"]))  
      {  
           $error = "<label class='text-danger'>Enter User name</label>";  
      } else if(empty($_POST["pass"]))  
      {  
           $error = "<label class='text-danger'>Confirme Password</label>";  
      } else if(empty($_POST["cpass"]))  
      {  
           $error = "<label class='text-danger'>Enter Password</label>";  
      } 

       
      else  
      {  
           if(file_exists('data.session'))  
           {  
                $current_data = file_get_contents('data.session');  
                $array_data = session_decode($current_data, true);  
                $extra = array(  
                     'name'               =>     $_POST['name'],  
                     'email'     =>     $_POST["email"]  ,
                     'uname'     =>     $_POST["uname"]  ,
                     'pass'     =>     $_POST["pass"]  ,
                     'cpass'     =>     $_POST["cpass"]  ,  
                     
                );  
                $array_data[] = $extra;  
                $final_data = session_encode($array_data);  
                if(file_put_contents('data.session', $final_data))  
                {  
                     $message = "<label class='text-success'>File Appended Success fully</p>";  
                }  
           }  
           else  
           {  
                $error = 'SESSION File not exits';  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Append Data to SESSION File using PHP</title>  
          

            <style type="text/css" media="screen">
              .box{
                  /* margin: 60px; */
                  
                  height: 170px;
                  width: 375px;
                  padding-left: 410px;
              }

              .box2{
                  height: 20px;
                  width: 180px;
              }
              .text-danger{
                color: red;
              }
              
            </style>


      </head>  
      <body>  
           <br />  
           <div class="container" style="width:500px;">                 
                <form method="post"> 

                <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  

                       
                     <form method="post">
                          <div class="box" >
                            <fieldset>
                              <legend>REGISTRATION</legend>
                            <div align="right" >
                           <label for="firstname">First name: </label>
                           <input type="text" name="fname" id="firstname">
                           <hr>
                           <label for="lastname">Last name: </label>
                           <input type="text" name="lname" id="lastname">
                           <hr>
                              <label> Email :</label>
                              <input type="email" name="email" class="box2" >
                              <hr>

                              <label> User id :</label>
                              <input type="text" id="uid" class="box2" >
                              <hr>

                              <label> Password :</label>
                              <input type="password" name="pass" class="box2" >
                              <hr>

                              <label> Confirme Password :</label>
                              <input type="password" name="cpass" class="box2" >
                              <hr>

                                 <fieldset>
                                <legend>Gender</legend>
                                <input type="radio" name="Male">Male
                                <input type="radio" name="Female">Female
                                <input type="radio" name="Male">Others
                                
                              </fieldset> <hr>

                              <fieldset>
                                <legend>Date of Birth</legend>
                                <input type="date" name="dob">
                                
                              </fieldset><hr>

                               </div> 

                             
                              
                               <input type="Submit" name="submit" value= "Login"> 
                               <input type="Submit" name="submit" value= "Logout"> 

                              <?php  
                               if(isset($message))  
                               {  
                                    echo $message;  
                               }  
                               ?>  


                            </fieldset>
                          </div>

                </form>  

           </div>  
           <br />  


                     
      </body>  
 </html>  