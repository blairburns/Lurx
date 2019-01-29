document.addEventListener("DOMContentLoaded", function(event) {
    var tbody = document.getElementById("tbody");
    var counter = document.getElementById("counter");
    document.getElementById("input").addEventListener("keyup", function(e) {
        if (e.keyCode === 13) {
          document.getElementById("input").blur();
          var str = document.getElementById("input").value;
          str = str.replace(`'`, "");
          console.log(str);
          searchQuery(str);
        }
      });
    document.getElementById("searchBtn").addEventListener("click", function(e) {
        var str = document.getElementById("input").value;
        str = str.replace(`'`, "");
        console.log(str);
        searchQuery(str);
    });

    getJSON();
    
});

var json;
var jsonLength;

function getJSON() {
    fetch("http://localhost:8888/includes/GET/employees.php")
      .then(function(response) {
        return response.json();
      })
      .then(function(jsonData) {
          json = jsonData;
          loadRow(jsonData);
          jsonLength = jsonData.length;
          //sortQuery(json, "Part");
      });
  }

function loadRow(json){
    counter.innerHTML = json.length;

    for (i=0; i< json.length; i++){
        rowTemplate(json, i);
    }
}

function rowTemplate(json, i){
    var rowTemplate = `<td>${json[i].first}</td>
    <td>${json[i].last}</td>
    <td>${json[i].email}</td>
    <td>${json[i].phone}</td>
    <td>${json[i].type}</td>
    <td>${json[i].address}</td>`
    var tr = document.createElement("tr");
    tr.innerHTML = rowTemplate;
    document.querySelector(".tbody").appendChild(tr);   
}

function sortBySelect() {
    var sortSelect = document.getElementById("sort_select");
    var selectedOption = sortSelect.options[sortSelect.selectedIndex].value;
    switch (selectedOption) {
      case "0":
        removeRows();
        loadRow(json);
        break;
      case "1":
        sortFull();
        break;
      case "2":
        sortPart();
        break;
      case "3":
        sortCasual();
        break;
    }
}


function sortFull(){
      removeRows();
      var sortedData = sortQuery("Full");
      loadRow(sortedData);
}

function sortPart(){
    removeRows();
    var sortedData = sortQuery("Part");
    loadRow(sortedData);
}

function sortCasual(){
    removeRows();
    var sortedData = sortQuery("Casual");
    loadRow(sortedData);
}


function removeRows(){
    while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
      }
}

function sortQuery(type){
    var queriedJson = [];
    for (i=0; i < jsonLength; i++){
        if (json[i].type == `${type}`){
            //console.log(json[i]);
            queriedJson.push(json[i]);
        }
    }
    return queriedJson;
}

function search(str){
    removeRows();
    loadRow(str);
}


function searchQuery(str){
    var response;

    http = new XMLHttpRequest();
    searchURI = "search=" + encodeURIComponent(str);
    http.open("POST", "../includes/searchEmployee.php", true);

    http.onreadystatechange = function httpResponse() {
        if (http.readyState == 4) {
          if (http.status == 200) {
            response = JSON.parse(http.response);
            search(response);
          }
        }
    };

    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(searchURI);
}
