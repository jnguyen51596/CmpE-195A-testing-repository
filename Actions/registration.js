function checkinfo() {
                
               
                var username = document.getElementById("username").value;
                var first = document.getElementById("firstname").value;
                var last = document.getElementById("lastname").value;
                var pass1 = document.getElementById("password").value;
                var pass2 = document.getElementById("confirm").value;
                //alert(username);
                if(username === "" || first === "" || last === "" || pass1 === "" || pass2 === "")
                {
                    alert("You left one or more fields empty. Please fill out everything.");
                    
                    //DO ANOTHER ELSEIF AND CHECK USERNAME AGAINST THE DB AFTER THIS ONE
                }else if(pass1 !== pass2)
                {
                    alert("Your passwords are not matching. Fix that!");
                }else
                {

                        $.ajax({
                            type: "POST",
                            url: "/Actions/register.php",
                            data: "username=" + username + "&first=" + first + "&last=" + last + "&pass1=" + pass1 + "&pass2=" + pass2,
                            cache: false,
                            success: function (data) {
                                if (data == 1) {
                                    alert("Successful Registration!!!");
                                    window.location = '/home';

                                }
                                else {
                                    alert('db crashed bro');
                                }
                            }
                        });
                    
                }
                                      

            }