const chevron = document.querySelector(".chevron");
const sidebar = document.querySelector(".sidebar");

chevron.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});