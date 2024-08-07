// Icons


const sunIcon = document.querySelector('.sun');
const moonIcon = document.querySelector('.moon');


const userTheme = localStorage.getItem('theme');
const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches;


const iconToggle = () => {
   moonIcon.classList.toggle('hidden')
   sunIcon.classList.toggle('hidden')
}

const themeCheck = () => {
   if (userTheme === 'dark' || (!userTheme && systemTheme)) {
      document.documentElement.classList.add('dark');
      moonIcon.classList.add('hidden')

      return;
   }
   sunIcon.classList.add('hidden');
}

const themeSwitch = () => {
   if (document.documentElement.classList.contains('dark')) {
      document.documentElement.classList.remove('dark');
      localStorage.setItem('theme', 'light');
      iconToggle();
      return;
   }
   document.documentElement.classList.add('dark');
   localStorage.setItem('theme', 'dark');
   iconToggle();
}

sunIcon.addEventListener('click', () => {
   themeSwitch();
})

moonIcon.addEventListener('click', () => {
   themeSwitch();
})


themeCheck();
let table = new DataTable('#myTable', {

   responsive: true,
   "language": {
      "sProcessing": "Processando...",
      "sLengthMenu": "_MENU_",
      "sZeroRecords": "Nenhum cadastro encontrado",
      "sEmptyTable": "Nenhum cadastro encontrado no sistema.",
      "sInfo": "Mostrando _TOTAL_ cadastros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "sInfoFiltered": "(Filtrado um total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",

      "oAria": {
         "sSortAscending": ": Ative para classificar a coluna em ordem crescente",
         "sSortDescending": ": Ative para classificar a coluna em ordem decrescente"
      }
   }
});
const tinymceOptions = {
   selector: '.tinymce',
   height: 543,
   menubar: false,
   statusbar: false,
   plugins: [
      'advlist', 'link', 'autolink', 'lists', 'code',
   ],
   toolbar: 'styles | forecolor backcolor emoticons | bold italic underline | link | bullist numlist | alignleft aligncenter alignright',
   directionality: document.documentElement.dir === 'rtl' ? 'rtl' : 'ltr'
};

document.addEventListener("DOMContentLoaded", function () {
   if (localStorage.getItem("theme") === 'dark') {
      tinymceOptions.skin = 'oxide-dark';
      tinymceOptions.content_css = 'dark';
   }
   tinyMCE.init(tinymceOptions);
});

const dropdowns = document.querySelectorAll(".dropdown");

// Check if Dropdowns are Exist
// Loop Dropdowns and Create Custom Dropdown for each Select Element
if (dropdowns.length > 0) {
   dropdowns.forEach((dropdown) => {
      createCustomDropdown(dropdown);
   });
}

// Create Custom Dropdown
function createCustomDropdown(dropdown) {
   // Get All Select Options
   // And Convert them from NodeList to Array
   const options = dropdown.querySelectorAll("option");
   const optionsArr = Array.prototype.slice.call(options);

   // Create Custom Dropdown Element and Add Class Dropdown
   const customDropdown = document.createElement("div");
   customDropdown.classList.add("dropdown");
   dropdown.insertAdjacentElement("afterend", customDropdown);

   // Create Element for Selected Option
   const selected = document.createElement("div");
   selected.classList.add("dropdown-select");
   selected.textContent = optionsArr[0].textContent;
   customDropdown.appendChild(selected);

   // Create Element for Dropdown Menu
   // Add Class and Append it to Custom Dropdown
   const menu = document.createElement("div");
   menu.classList.add("dropdown-menu");
   customDropdown.appendChild(menu);
   selected.addEventListener("click", toggleDropdown.bind(menu));

   // Create Search Input Element
   const search = document.createElement("input");
   search.placeholder = "Procure por nome...";
   search.type = "text";
   search.classList.add("dropdown-menu-search");
   menu.appendChild(search);

   // Create Wrapper Element for Menu Items
   // Add Class and Append to Menu Element
   const menuInnerWrapper = document.createElement("div");
   menuInnerWrapper.classList.add("dropdown-menu-inner");
   menu.appendChild(menuInnerWrapper);

   // Loop All Options and Create Custom Option for Each Option
   // And Append it to Inner Wrapper Element
   optionsArr.forEach((option) => {
      const item = document.createElement("div");
      item.classList.add("dropdown-menu-item");
      item.dataset.value = option.value;
      item.textContent = option.textContent;
      menuInnerWrapper.appendChild(item);

      item.addEventListener(
         "click",
         setSelected.bind(item, selected, dropdown, menu)
      );
   });

   // Add Selected Class to First Custom Select Option
   menuInnerWrapper.querySelector("div").classList.add("selected");

   // Add Input Event to Search Input Element to Filter Items
   // Add Click Event to Element to Close Custom Dropdown if Clicked Outside
   // Hide the Original Dropdown(Select)
   search.addEventListener("input", filterItems.bind(search, optionsArr, menu));
   document.addEventListener(
      "click",
      closeIfClickedOutside.bind(customDropdown, menu)
   );
   dropdown.style.display = "none";
}

// Toggle for Display and Hide Dropdown
function toggleDropdown() {
   if (this.offsetParent !== null) {
      this.style.display = "none";
   } else {
      this.style.display = "block";
      this.querySelector("input").focus();
   }
}

// Set Selected Option
function setSelected(selected, dropdown, menu) {
   // Get Value and Label from Clicked Custom Option
   const value = this.dataset.value;
   const label = this.textContent;

   // Change the Text on Selected Element
   // Change the Value on Select Field
   selected.textContent = label;
   dropdown.value = value;

   // Close the Menu
   // Reset Search Input Value
   // Remove Selected Class from Previously Selected Option
   // And Show All Div if they Were Filtered
   // Add Selected Class to Clicked Option
   menu.style.display = "none";
   menu.querySelector("input").value = "";
   menu.querySelectorAll("div").forEach((div) => {
      if (div.classList.contains("is-select")) {
         div.classList.remove("is-select");
      }
      if (div.offsetParent === null) {
         div.style.display = "block";
      }
   });
   this.classList.add("is-select");
}

// Filter the Items
function filterItems(itemsArr, menu) {
   // Get All Custom Select Options
   // Get Value of Search Input
   // Get Filtered Items
   // Get the Indexes of Filtered Items
   const customOptions = menu.querySelectorAll(".dropdown-menu-inner div");
   const value = this.value.toLowerCase();
   const filteredItems = itemsArr.filter((item) =>
      item.value.toLowerCase().includes(value)
   );
   const indexesArr = filteredItems.map((item) => itemsArr.indexOf(item));

   // Check if Option is not Inside Indexes Array
   // And Hide it and if it is Inside Indexes Array and it is Hidden Show it
   itemsArr.forEach((option) => {
      if (!indexesArr.includes(itemsArr.indexOf(option))) {
         customOptions[itemsArr.indexOf(option)].style.display = "none";
      } else {
         if (customOptions[itemsArr.indexOf(option)].offsetParent === null) {
            customOptions[itemsArr.indexOf(option)].style.display = "block";
         }
      }
   });
}

// Close Dropdown if Clicked Outside Dropdown Element
function closeIfClickedOutside(menu, e) {
   if (
      e.target.closest(".dropdown") === null &&
      e.target !== this &&
      menu.offsetParent !== null
   ) {
      menu.style.display = "none";
   }
}

 