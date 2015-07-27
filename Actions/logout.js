function logout() {
	$.ajax({
            type: "POST",
            url: "../Actions/logout.php",
            success: function (data) {
                if (data == 'true') {
                	sessionStorage.clear();
                    window.location = '../index.html';
                }
                else {
                    alert("Unable to logout");
                }
            }
        });
}