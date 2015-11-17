var email;
var bio;
var password;
var xmlhttp = new XMLHttpRequest();
var username = "batman";

function editInfo() {
                email = document.getElementById("email").value;
                bio = document.getElementById("bio").value;
                 $.ajax({
                type: "POST",
                url: "/Actions/editProfile.php",
                data: "&email=" + email + "&bio=" + bio,
                cache: false,
                success: function (data) {
                    if (data == 1) {
                        alert("Successful Update!");
                        window.location = '/home/view-profile';
                    }
                    else {
                        alert(data);
                    }
                }
            });
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
