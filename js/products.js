



const limit = 12;
let filteredProducts = []; // Initialize as an empty array to avoid 'undefined' errors

function paginateFun(number_page) {
  const tableElement = document.getElementById("data");

  tableElement.innerHTML = "";

  const start = (number_page - 1) * limit;
  const end = number_page * limit;

  const paginate_items = filteredProducts.slice(start, end).map((elem) => {
    return `
    <div class="group/item relative m-2 p-2 w-[230px] h-[350px] flex max-w-xs flex-col justify-between overflow-hidden border border-gray-100 bg-white transition duration-300 ease-in-out hover:shadow-md">

    <span class="absolute z-50 top-0 right-0 bg-[#128ece] px-2 text-center text-sm font-medium text-white">-${elem["PrixFinal"] - elem["OffreDePrix"]}.00 MAD</span>

    <div class="relative pt-2 flex h-40 overflow-hidden justify-center">
        <img class="object-cover transition-all duration-300 ease-in-out " src="${elem["img"]}" alt="product image" />
        <div class=" bottom-2 left-2 rounded-md flex justify-center items-center   absolute top-2 right-2 scale-0 transition duration-300 ease-in-out group-hover/item:scale-100  bg-white/30 px-2 text-center ">
        <a href='#' class='px-4 py-2 bg-white/50 rounded-sm shadow-md'>Display</a>
        </div>

    </div>

    <div class="flex justify-between flex-col items-center gap-4">

        <h2 class="text-[#68686c] border-t border-b px-4 text-center">
            ${elem["Etiquette"]}
        </h2>

        <div class=" flex flex-col justify-center items-center h-[50px] gap-1">
            <span class="text-[#128ece] font-semibold text-[18px]">${elem["OffreDePrix"]},00 MAD</span>
            <span class="text-[#68686c] text-[12px] line-through leading-[1.2em] block">${elem["PrixFinal"]},00 MAD</span>
            <span class="text-[#559f45] text-md leading-[1.2em] block">
                <span class="text-[#559f45] text-sm px-1">✓</span>Produit en stock (${elem["PrixFinal"]})
            </span>
        </div>

        <button class="group/btn relative w-5/6 p-2 text-end bg-white text-[#19488f] text-sm border border-[#19488f] hover:bg-[#19488f] hover:text-white hover:border-transparent">
            <span class="absolute px-4 top-0 left-0 bottom-0 right-full transition-right duration-300 ease-in bg-[#19488f] text-white text-base flex justify-center items-center group-hover/btn:right-0">+</span>
            Ajouter au panier
        </button>

    </div>

</div>


`;
  });

  tableElement.innerHTML = paginate_items.join("");

  const buttons = [...Array(Math.ceil(filteredProducts.length / limit)).keys()].map((elem) => {
    return `<li class="page-item">
      <button class="page-link" data-page="${elem + 1}" onclick="paginateFun(${elem + 1})">${elem + 1}</button>
    </li>`;
  });

  document.getElementById("paginate").innerHTML = buttons.join("");

  const buttone = document.querySelectorAll('.page-link');
  buttone.forEach(button => {
    button.classList.remove('active');
  });

  const activeButton = document.querySelector(`.page-link[data-page="${number_page}"]`);
  if (activeButton) {
    activeButton.classList.add('active');
  }
}


//.....................

function fetchDataAndUpdateTable(selectedValue, searchTerm) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', "products_select.php?selectedValue=" + selectedValue + "&searchTerm=" + searchTerm, true);

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      const data = JSON.parse(xhr.responseText);

      // Update filteredProducts with fetched data
      filteredProducts = data;
      console.log(data);

      if (selectedValues.length > 0) {
        const selectedValuesIds = selectedValues.map(id => parseInt(id));
        console.log('main data ', data);
        console.log('filtered data ', filteredProducts);
        console.log("category filter")
        filteredProducts = data.filter(product => {

          return selectedValuesIds.includes(product.CategorieID);

        });
      } else {
        console.log(data);
        console.log("category filter faild")
      }

      paginateFun(1); // Call paginateFun after fetching data
    } else {
      console.error('Request failed with status ' + xhr.status);
    }
  };

  xhr.onerror = function () {
    console.error('Request failed');
  };

  xhr.send();
}

fetchDataAndUpdateTable(5, 'a');

function handleSelectionChange() {
  var selectElement = document.getElementById('mySelect');
  var selectedValue = selectElement.value;
  fetchDataAndUpdateTable(selectedValue, "a");
}



function filterProducts(searchValue) {

  console.log(searchValue);

  fetchDataAndUpdateTable(10, searchValue);


}