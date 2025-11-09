import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Hamburger
const hamburger = document.querySelector("#hamburger");
const navMenu = document.querySelector("#nav-menu");

hamburger.addEventListener("click", function () {
    hamburger.classList.toggle("hamburger-active");
    navMenu.classList.toggle("hidden");
});

document.addEventListener("click", function (event) {
    const targetElement = event.target;

    if (
        !navMenu.contains(targetElement) &&
        !hamburger.contains(targetElement)
    ) {
        navMenu.classList.add("hidden");
        hamburger.classList.remove("hamburger-active");
    }
});

// Auto Logout after idle
let idleTime = 0;
const maxIdleTime = 20 * 60 * 1000; // 15 menit

let idleTimer;

function resetTimer() {
    clearTimeout(idleTimer);
    idleTimer = setTimeout(logoutUser, maxIdleTime);
}

function logoutUser() {
    // Kirim permintaan logout ke server
    fetch("{{ route('logout') }}", {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
            "Content-Type": "application/json",
        },
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
}

// Reset timer setiap ada aktivitas user
window.onload = resetTimer;
document.onmousemove = resetTimer;
document.onkeypress = resetTimer;
document.onscroll = resetTimer;
document.onclick = resetTimer;
