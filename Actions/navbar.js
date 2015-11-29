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

function goBack() {
    var lastPage = location.pathname;
    lastPage = lastPage.substring(0, lastPage.lastIndexOf('/'));
    lastPage = lastPage.substring(0, lastPage.lastIndexOf('/'));
    if (lastPage == "") {
        logout();
    } else {
        window.location.href = lastPage;
    }
}