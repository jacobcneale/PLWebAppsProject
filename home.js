var index = 0;

//Retrieves posts data from database via json and ajax
function loadHomePosts() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "index.php?command=json", true);
    ajax.responseType = "json";
    ajax.send(null);

    ajax.addEventListener("load", function() {
        if (this.status == 200) {
            var arr = this.response;//JSON.parse(this.response);
            displayHome(arr);
        } else {
            alert("An error occured while loading the posts.");
        }
    });

    ajax.addEventListener("error", function() {
        alert("An error occured while loading the posts.");
    });
}

//Displays the posts in the feed section
function displayHome(posts){
    const feed = document.getElementById("feed");
    feed.innerHTML="";
    if(index<0){
        index = 0;
    }
    if(index>posts.length-1){
        index = posts.length-1;
    }
    for(var x = index; x<posts.length && x<index+4; x++){
        var element=posts[posts.length-1-x];
        var html = "<div style=\"width: 270px\"><div class=\"postheader\">"
        + "<h3>" +  element["title"] + "</h3><br>"
        + "<p> Created by: " + element["username"] + "</p></div>"
        + "<p> " + element["content"] + "</p></div>";
        feed.innerHTML+=html;
    }
    feed.innerHTML += "<div class=\"viewmore\"><h3><a href=\"index.php?command=posts\">See More Posts</a></h3><p></p></div>";
}

//Changes which posts (by index) are viewed
let change = (a) => {index+=a; loadHomePosts();}

//Adds listeners to buttons to change view
loadHomePosts();
const next = document.getElementById("next");
next.addEventListener("click", function() {change(1);});
const prev = document.getElementById("prev");
prev.addEventListener("click", function() {change(-1)});

