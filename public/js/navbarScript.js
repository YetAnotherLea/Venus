const profileBtn = document.getElementById("profile-btn");
const dropdown = document.getElementById("dropdown-content_profile");

profileBtn.addEventListener("click", function (e) {
    e.stopPropagation(); // Empêche la fermeture immédiate
    dropdown.style.display = dropdown.style.display === "block" ? "none" : "block";
});

document.addEventListener("click", function () {
    dropdown.style.display = "none";
});
