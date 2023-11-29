function loadAllPosts() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "index.php?command=json", true);
    ajax.responseType = "json";
    ajax.send(null);

    ajax.addEventListener("load", function() {
        if (this.status == 200) {
            var arr = this.response;//JSON.parse(this.response);
            displayPosts(arr);
        } else {
            alert("An error occured while loading the posts.");
        }
    });

    ajax.addEventListener("error", function() {
        alert("An error occured while loading the posts.");
    });
}

function displayPosts(posts){
    const board = document.getElementById("postBoard");
    board.innerHTML="";
    posts.forEach(element => {
        var html = "<div class=\"post\">"
            + "<h4>" +  element["title"] + "</h4>"
            + "<label> Created by: " + element["username"] + "</label><br>"
            + "<label> " + element["date"] + "</label>"
            + "<p> " + element["content"] + "</p></div>";
        board.innerHTML = html + board.innerHTML;
    });
}

loadAllPosts();
const refresh = document.getElementById("refresh");
refresh.addEventListener("click", loadAllPosts);

/*const view = document.getElementById("switchView");
view.addEventListener("click", function() {
    const board = document.getElementById("postBoard");
    if(this.value="column"){
        this.value="table";

    }
    else{

    }
});*/
