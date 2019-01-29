document.addEventListener("DOMContentLoaded", function(event) {
  getJSON();
  laodCardsBtn = document.getElementById("loadCardsBtn");
  var counter = document.getElementById("counter"); //.innerHTML;
  var grid = document.getElementById("grid");
  document.getElementById("loadCardsBtn").addEventListener("click", callLMC);
  document.getElementById("searchBtn").addEventListener("click", function(e) {
    var str = document.getElementById("input").value;
    str = str.replace(`'`, "");
    search(str);
  });
  document.getElementById("input").addEventListener("keyup", function(e) {
    if (e.keyCode === 13) {
      document.getElementById("input").blur();
      var str = document.getElementById("input").value;
      str = str.replace(`'`, "");
      search(str);
    }
  });
});

var data;
var cardsPerPage = 12;
var pageCount = 1;
var cardsAdded;
var searchStr;
var jsonSearchData;
var hasSearched = false;
var loadBtnHidden = false;
var varCount;

function getJSON() {
  fetch("http://localhost:8888/includes/GET/products.php")
    .then(function(response) {
      return response.json();
    })
    .then(function(json) {
      	loadCards(json); //initial load
	  	data = json;
		//varCount = data.length;
    });
}

function callLMC() {
  loadMoreCards(data);
}

function loadCards(data) {
  if (data.length < cardsPerPage) {
    hideLoadBtn();
  }
  if (loadBtnHidden && data.length > cardsPerPage) {
    showLoadBtn();
  }
  counter.innerHTML = data.length;
 

  try {
    for (i = 0; i < cardsPerPage; i++) {
      cardTemplate(data, i);
    }

    cardsAdded = cardsPerPage;
  } catch (err) {
    hideLoadBtn();
  }
}

function loadMoreCards(data) {
  if (data.length < cardsPerPage) {
    hideLoadBtn();
  }
  if (loadBtnHidden && data.length > cardsPerPage) {
    showLoadBtn();
  }

  if (hasSearched == true) {
    data = jsonSearchData;
  }

  if (cardsAdded >= data.length) {
    hideLoadBtn();
  } else {
    if (cardsAdded > cardsPerPage - 1) {
      try {
        pageCount++;
        for (i = cardsAdded, y = 0; y < cardsPerPage; i++, y++) {
          cardTemplate(data, cardsAdded);
          cardsAdded = i + 1;
        }
      } catch (err) {
        hideLoadBtn();
      }
    }
  }
}

function sortBySelect() {
  var sortSelect = document.getElementById("sort_select");
  var selectedOption = sortSelect.options[sortSelect.selectedIndex].value;
  switch (selectedOption) {
    case "1":
      sortHL();
      break;
    case "2":
      sortLH();
      break;
    case "3":
      sortAZ();
      break;
    case "4":
      sortZA();
      break;
  }
}

function sortHL() {
  removeCards();
  data.sort(function(a, b) {
    return b.price - a.price;
  });
  loadCards(data);
}

function sortLH() {
  removeCards();
  data.sort(function(a, b) {
    return a.price - b.price;
  });
  loadCards(data);
}

function sortAZ() {
  removeCards();
  data.sort((a, b) => a.name.localeCompare(b.name));
  loadCards(data);
}

function sortZA() {
  removeCards();
  data.sort((a, b) => b.name.localeCompare(a.name));
  loadCards(data);
}

function removeCards() {
  while (grid.firstChild) {
    grid.removeChild(grid.firstChild);
  }
  pageCount = 1;
  cardsAdded = 0;
}

function search(str) {
  removeCards();
  hasSearched = true;

  //open a http request

  http = new XMLHttpRequest();
  searchURI = "search=" + encodeURIComponent(str);
  http.open("POST", "../includes/search.php", true);

  //execute on http response

  http.onreadystatechange = function() {
    if (http.readyState == 4) {
      if (http.status == 200) {
        jsonSearchData = JSON.parse(http.response);
        searchComplete();
        varCount = jsonSearchData.length;
      }
    }
  };

  //send http request
  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http.send(searchURI);
}

function searchComplete() {
  if (varCount <= 0) {
    counter.innerHTML = 0;
    hideLoadBtn();
  } else {
    loadCards(jsonSearchData);
  }
}

function cardTemplate(data, i) {
	var saleDiv = "sale" + i;
  	var delDiv = "del" + i;
  	var spDiv = "spDiv" + i;
  	var priceDiv = "priceDiv" + i;

  	var li = `<li class="block" id="block">
                <a class="internal" href="">
                <div class="product_image" style="background: url(${
                  data[i].imageURL
                }); background-position: center; background-repeat: no-repeat; background-size: cover;">  
                <div class="saleBanner" id="${saleDiv}">SALE</div>
                </div><div class="product_info">
                <div class="product_brand">${data[i].brand}</div>
                <div class="product_name">${data[i].name}</div>
                </div><div class="product_meta">
                <div class="product_meta_left">
                <div class="product_price" id="${priceDiv}">$${
    data[i].price
  }</div>
                <div class="product_salePrice" id="${spDiv}">$${
    data[i].salePrice
  }</div>
                </div>
                <div class="product_meta_right">
                <div class="product_delivery" id="${delDiv}">Free Delivery</div>
                </div>
                </div>
                </a>
                </li>`;

  var ul = document.createElement("ul");
  ul.innerHTML = li;
  var element = ul.firstChild;
  document.querySelector(".grid").appendChild(element);

  if (data[i].sale == 1) {
    document.getElementById(saleDiv).style.visibility = "visible";
    document.getElementById(spDiv).style.visibility = "visible";
    document.getElementById(priceDiv).style.textDecoration = "line-through";
    document.getElementById(priceDiv).style.color = "#6C6C6C";
  }

  if (data[i].delivery == 1) {
    document.getElementById(delDiv).style.visibility = "visible";
  }
}

function hideLoadBtn() {
  laodCardsBtn.style.visibility = "hidden";
  loadBtnHidden = true;
}

function showLoadBtn() {
  laodCardsBtn.style.visibility = "visible";
  loadBtnHidden = false;
}
