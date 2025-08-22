document.getElementById("init-btn").addEventListener("click", initData);
document.getElementById("status-btn").addEventListener("click", showData);

// Initializes the flashcards database and populates the groups table
function initData() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "includes/initData.inc.php", true);

    xhr.onload = function() {

        if(this.status == 200) {

            document.getElementsByClassName("home-page")[0].style.display = "none";
            document.getElementsByClassName("init-page")[0].style.display = "block";

            document.getElementById("init-status").innerHTML = this.responseText;
        }
    }
    xhr.send();
}

// Retreives and displays all the entries within the groups table
function showData() {
    
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "includes/getData.inc.php", true);

    xhr.onload = function() {

        if(this.status == 200) { 
            
            var groups = JSON.parse(this.responseText);
            var count = 0;
            var textData = "";
            var tableData = "<table><tr><th width='10%'>ID</th><th>Name</th><th>Image</th></tr>";

            for (var i in groups) {
                textData += "<ul>" +
                "<li>ID: " + groups[i].id + "<ul>" +
                "<li>NAME: " + groups[i].name + "</li>" +
                "<li>URL: " + groups[i].url + "</li></ul>" +
                "</li></ul>";

                tableData += "<tr>" +
                    "<th>" + groups[i].id + "</th>" +
                    "<th>" + groups[i].name + "</th>" +
                    "<th><img src='" + groups[i].url + "'></th>" +
                    "</tr>";

                count++;
            }
            
            document.getElementsByClassName("home-page")[0].style.display = "none";
            document.getElementsByClassName("status-page")[0].style.display = "block";

            document.getElementById("entries").innerHTML = "Entries: " + count;
            document.getElementById("text-data").innerHTML = textData;
            document.getElementById("table-data").innerHTML = tableData;
        }
    }

    xhr.send();
    
}
