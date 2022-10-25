const ul = document.querySelector("ul.todos");
const searchFormInput = document.querySelector("form.search input");


//SEARCH INPUT: PREVENT DEFAULT ACTION - LITTLE BUG I FOUND IN THE COURSE PROJECT
searchFormInput.parentElement.addEventListener("submit", (e) =>
  e.preventDefault()
);

//SEARCH AND FILTER TODOS
const filterItems = (value) => {
  Array.from(ul.children).forEach((li) => {
    if (!li.textContent.toLowerCase().includes(value)) li.classList.add("filtred");
    else li.classList.remove("filtred");
  });
};

searchFormInput.addEventListener("keyup", (e) => {
  const value = searchFormInput.value.toLowerCase().trim();
  filterItems(value);
});
