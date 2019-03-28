let toggler = document.querySelectorAll('.caret');

toggler.forEach(element => {
  element.addEventListener("click", event => {
    event.target.parentElement.querySelector(".nested").classList.toggle("active");
    event.target.classList.toggle("caret-down");
  });
})