const chevron = document.querySelector(".chevron");
const sidebar = document.querySelector(".sidebar");

chevron.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});
const menuBtn = document.querySelector(".menu-toggle");
menuBtn.addEventListener("click", () => {
    sidebar.classList.toggle("active");
});
document.addEventListener("click", function(e){

if(!sidebar.contains(e.target) && !menuBtn.contains(e.target)){
sidebar.classList.remove("active");
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