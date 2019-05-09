$(function() {

        
          var error_username = false;
          var error_password = false;
          var error_retype_password = false;
          var error_email = false;
          var error_phone = false;
		  var isok=false;
		  
		  //no placeholder when you focus in text box
		  $('[placeholder]').focus(function(){
			  
			  $(this).attr('data-text',$(this).attr('placeholder'));
			  $(this).attr('placeholder','');
			  
		  }).blur(function(){
			  
			  $(this).attr('placeholder',$(this).attr('data-text'));
		  } );
		  
		  

          $("#username").focusout(function() {

            check_username();
            
          });

          $("#Password").focusout(function() {

            check_password();
            
          });

          $("#Passwordc").focusout(function() {

            check_retype_password();
            
          });

          $("#email").focusout(function() {

            check_email();
            
          });
           $("#phone").focusout(function() {

            check_phone();
            
          });

          function check_username() {
          
            var username_length = $("#username").val().length;
            
              if(username_length==0)
              {
                $("#usernamealert").html("empty Required field");
                $("#usernamealert").show();
                error_username = true;

              }
              else if(username_length < 5 || username_length > 20) {
              $("#usernamealert").html("Should be between 5-20 characters");
              $("#usernamealert").show();
              error_username = true;
            } else {
              $("#usernamealert").hide();
			   error_username = false;
            }
          
          }

          function check_password() {
          
            var password_length = $("#Password").val().length;
            
            if(password_length ==0)
            {
              $("#passwordalert").html("empty Required field");
              $("#passwordalert").show();
              error_password = true;

            }
            else if (password_length < 8) {
              $("#passwordalert").html("At least 8 characters");
              $("#passwordalert").show();
              error_password = true;
            } else {
              $("#passwordalert").hide();
			  error_password = false;

            }
          
          }

          function check_retype_password() {
            
           var passwordc_length = $("#Passwordc").val().length;
          
            var password = $("#Password").val();
            var retype_password = $("#Passwordc").val();
            if(passwordc_length==0)
            {
              $("#pasconfirmalert").html("empty Required field");
              $("#pasconfirmalert").show();
              error_retype_password = true;

            }
            else if(password !=  retype_password) {
              $("#pasconfirmalert").html("Passwords don't match");
              $("#pasconfirmalert").show();
              error_retype_password = true;
            } else {
              $("#pasconfirmalert").hide();
			  error_retype_password = false;

            }
          
          }

          function check_email() {

           var email_length = $("#email").val().length;


            var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
            if(email_length==0)
            {
              $("#emailalert").html("empty Required field");
              $("#emailalert").show();
              error_email = true;

            }
            else if(!pattern.test($("#email").val())) {
				
				 $("#emailalert").html("Invalid email address .email must contain @");
              $("#emailalert").show();
              error_email = true;
             
            } 
			
			
			else {
				var email = $("#email").val();
				$.ajax({
					  url: 'process.php',
					  type: 'post',
					  data: {
						'email_check' : 1,
						'email' : email,
					  },
					  success: function(response){
						if (response == 'taken' ) {
							$("#emailalert").html('Email already exists');
						  $("#emailalert").show();
							 error_email = true;
							

						  
						  
						  
						}
						else{
					
							$("#emailalert").hide();
							 error_email = false;
							 

								
							}
					  }
					});
			
				
				
				
				 
             
            }
          
          }
		  
		
	
		


          function check_phone() {

           var phone_length = $("#phone").val().length;

           var pattern = new RegExp(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im);
            
            if(phone_length==0)
            {
              $("#phonealert").html("empty Required field");
              $("#phonealert").show();
              error_phone = true;

            }
            else if(!pattern.test($("#phone").val())) {
              $("#phonealert").html("Invalid phone number");
              $("#phonealert").show();
              error_phone = true;
			  
			 
            } else {
				 $("#phonealert").hide();
				 error_phone=false;

              
            }
          
          }

          $("#registration_form").submit(function() {
                              
            error_username = false;
            error_password = false;
            error_retype_password = false;
            error_email = false;
            error_phone=false;
                  
            check_username();
            check_password();
            check_retype_password();
            check_email();
            check_phone();
            
            if(error_username == true || error_password == true || error_retype_password == true || error_email == true|| error_phone == true) {
              isok=false;
			 //return isok; //important return false - can't go to action page - fix errors first


            } else {
				isok=true
			  //return isok; //important return true - go to action page

            }
			
			return isok;

          });
		  
		  

    });
   
    	

