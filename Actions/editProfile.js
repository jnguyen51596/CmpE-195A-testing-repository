var first;
var last;
var password;
var xmlhttp = new XMLHttpRequest();
var username = "batman";

function editInfo() {
                var first = document.getElementById("fname").value;
                var last = document.getElementById("lname").value;
                var opass = document.getElementById("opass").value;
                var npass = document.getElementById("npass").value;
                var cnpass = document.getElementById("cnpass").value;
                
                if(first === "" || last === "" || opass === "" || npass === "" || cnpass === ""){
                    alert("You left one or more fields empty. Please fill out everything.");
                    
                    //DO ANOTHER ELSEIF AND CHECK USERNAME AGAINST THE DB AFTER THIS ONE
                }else if(npass !== cnpass){
                    alert("Your new passwords are not matching. Fix that!");
                }else
                {
                    alert(first + " " + last);
                        $.ajax({
                            type: "POST",
                            url: "/Actions/editProfile.php",
                            data: "&first=" + first + "&last=" + last + "&pass=" + npass + "&username=" + username,
                            cache: false,
                            success: function (data) {
                                if (data == 1) {
                                    alert("Successful Update!");
                                     window.location = 'userHome.php';
                                }
                                else {
                                    alert(data);
                                }
                            }
                        });
                }
            }
            
function checkPassword(opass){
    var currentPass = getPassw(username);
    currentPass = currentPass.replace(/\s+/g, '');
    alert(currentPass + " " + opass);
    
    if(opass === currentPass){
        return 1;
    }else{
        return 0;
    }
}

function getPassw(username) {
    return $.ajax({
        type: "POST",
        url: "/Actions/getPassword.php",
        data: "username=" + username,
        async: false,
    }).responseText;
}

function home() {
    window.location = "/home";
}
