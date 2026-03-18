const chevron = document.querySelector(".chevron");
const sidebar = document.querySelector(".sidebar");
const body = document.body;
const profileBar = document.querySelector(".info-bar");
let sidebarCloseTimeout;

chevron.addEventListener("click", () => {
    if (window.innerWidth <= 768) {
        sidebar.classList.remove("active");
        syncSidebarOpenedClass();
        return;
    }

    sidebar.classList.toggle("close");
});
const menuBtn = document.querySelector(".menu-toggle");

if (profileBar) {
    profileBar.addEventListener("click", function (e) {
        if (e.target.closest(".profile-dropdown")) {
            return;
        }

        e.stopPropagation();
        profileBar.classList.toggle("open");
    });

    profileBar.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " ") {
            e.preventDefault();
            profileBar.classList.toggle("open");
        }
    });
}

function syncSidebarOpenedClass() {
    if (sidebar.classList.contains("active")) {
        clearTimeout(sidebarCloseTimeout);
        body.classList.remove("sidebar-closing");
        body.classList.add("sidebar-opened");
    } else {
        const wasOpened = body.classList.contains("sidebar-opened");
        body.classList.remove("sidebar-opened");

        if (window.innerWidth <= 768 && wasOpened) {
            body.classList.add("sidebar-closing");
            clearTimeout(sidebarCloseTimeout);
            sidebarCloseTimeout = setTimeout(() => {
                body.classList.remove("sidebar-closing");
            }, 550);
        } else {
            body.classList.remove("sidebar-closing");
        }
    }
}

menuBtn.addEventListener("click", () => {
    sidebar.classList.toggle("active");
    syncSidebarOpenedClass();
});
document.addEventListener("click", function(e){

if(!sidebar.contains(e.target) && !menuBtn.contains(e.target)){
sidebar.classList.remove("active");
syncSidebarOpenedClass();
}

if(profileBar && !profileBar.contains(e.target)){
profileBar.classList.remove("open");
}

});
const searchInput = document.getElementById("searchInput");
const rows = document.querySelectorAll(".custom-table tbody tr");

searchInput.addEventListener("keyup", function () {

    let value = searchInput.value.toLowerCase();

    rows.forEach(row => {

        let text = row.innerText.toLowerCase();

        if(text.includes(value)){
            row.style.display = "";
        }else{
            row.style.display = "none";
        }

    });

});

// expand news script 
document.querySelectorAll(".show-more").forEach(btn => {

    btn.addEventListener("click", function(e){
        e.preventDefault();

        const text = this.closest(".news-content").querySelector(".news-text");

        text.classList.toggle("expand");

        if(text.classList.contains("expand")){
            this.innerHTML = 'Weniger anzeigen <img src="./assets/images/red-cgev-down.svg">';
        }else{
            this.innerHTML = 'Mehr anzeigen <img src="./assets/images/red-cgev-down.svg">';
        }

    });

});
// table Columns 

 (function () {
            // Popup logic
            const trigger = document.getElementById('columnPopupTrigger');
            const popup = document.getElementById('columnPopup');
            const closeBtn = document.getElementById('closePopupBtn');
            const cancelBtn = document.getElementById('cancelPopupBtn');

            if (trigger && popup) {
                trigger.addEventListener('click', function (e) {
                    e.stopPropagation();
                    popup.classList.toggle('show');
                });
            }

            // Close buttons
            if (closeBtn) {
                closeBtn.addEventListener('click', function () {
                    popup.classList.remove('show');
                });
            }
            if (cancelBtn) {
                cancelBtn.addEventListener('click', function () {
                    popup.classList.remove('show');
                });
            }

            // Click outside closes popup (except on trigger)
            window.addEventListener('click', function (e) {
                if (!popup || !trigger) return;
                if (!popup.contains(e.target) && !trigger.contains(e.target)) {
                    popup.classList.remove('show');
                }
            });

            // Prevent clicks inside popup from triggering the close logic
            if (popup) {
                popup.addEventListener('click', function (e) {
                    e.stopPropagation();
                });
            }
        })();
        // profle image 
document.querySelector(".close-btn").addEventListener("click", function () {
  this.parentElement.style.display = "none";
});