function logout() {
    let confirmLogout = confirm("Are you sure you want to log out?");
    if (confirmLogout) {
        alert("You have been logged out successfully.");
        window.location.href = "login.html"; // Redirects to login page
    }
}