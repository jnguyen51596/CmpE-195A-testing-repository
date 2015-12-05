function checkinfo() {
                
               
                var username = document.getElementById("username").value;
                var first = document.getElementById("firstname").value;
                var last = document.getElementById("lastname").value;
                var pass1 = document.getElementById("password").value;
                var pass2 = document.getElementById("confirm").value;


                if(username === "" || first === "" || last === "" || pass1 === "" || pass2 === "")
                {
                    alert("You left one or more fields empty. Please fill out everything.");
                    
                }else
                { 
                    $.ajax({
                    type: "POST",
                    url: "../Actions/registerCheck.php",
                    data: "username=" + username,
                    async: true,
                    cache: false,
                    success: function (data) {
                        if (data === "false") {
                            
                            
                            
                            if(pass1 !== pass2)
                            {
                                alert("Your passwords are not matching");
                            }else 
                            {
                                
                                $.ajax({
                                    type: "POST",
                                    url: "../Actions/register.php",
                                    data: "username=" + username + "&first=" + first + "&last=" + last + "&pass1=" + pass1 + "&pass2=" + pass2,
                                    async: true,
                                    cache: false,
                                    success: function (data) {
                                        if (data == 1) {
                                            alert("Successful Registration");
                                            window.location = '/home';

                                        }else 
                                        {
                                            alert('db crashed bro');
                                        }
                                    }
                                });
                                
                            }
                        }else{
                            
                            alert("That username is taken");
                            
                        }
                    }
                });
            }
        }
                            
                            
                            
                            
                            
                            
                          
//                        }
//                        else {
//                            
//                            alert("Name exists in db try again bro");
//                            
//                        }
//                    }
//                });
//                   
//                   
//                   //asdasdasd
//                }else if(pass1 !== pass2)
//                {
//                    alert("Your passwords are not matching. Fix that!");
//                }else
//                {
//
//                        $.ajax({
//                            type: "POST",
//                            url: "../Actions/register.php",
//                            data: "username=" + username + "&first=" + first + "&last=" + last + "&pass1=" + pass1 + "&pass2=" + pass2,
//                            cache: false,
//                            success: function (data) {
//                                if (data == 1) {
//                                    alert("Successful Registration!!!");
//                                    window.location = 'userHome.php';
//
//                                }
//                                else {
//                                    alert('db crashed bro');
//                                }
//                            }
//                        });
//                    
//                }
//                                      
//
//            }
//            
// function checkUsername() { 
//                var username = document.getElementById("username").value;
//                var bool = true;
//                //stuck, for some reason it runs this ajax call last and wont change the check variable wtf
//                $.ajax({
//                    type: "POST",
//                    url: "../Actions/registerCheck.php",
//                    data: "username=" + username,
//                    cache: false,
//                    success: function (data) {
//                        if (data == 'false') {
//                           check = 1;
//                            alert("its all good");
//                          
//                        }
//                        else {
//                            check = 0;
//                            alert("nah blud");
//                            
//                        }
//                    }
//                });
                
         
            
     