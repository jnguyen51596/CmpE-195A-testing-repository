function logout() {
	$.ajax({
            type: "POST",
            url: "/Actions/logout.php",
            success: function (data) {
                if (data == 'true') {
                	sessionStorage.clear();
                    window.location = '/';
                }
                else {
                    alert("Unable to logout");
                }
            }
        });
}

function home() {
    window.location.href = "/home";
}