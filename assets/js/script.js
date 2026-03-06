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