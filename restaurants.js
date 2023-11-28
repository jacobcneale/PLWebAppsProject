// Separation of concerns: Make restaurants folder, .txt files containing descriptions and menus for each restaurant
    // This should shorten the filelength of this file. Another (more optimal) solution is to use the database,
    // but I don't want to mess anything up in our current database.

// This function constructs a restaurant object. - PARAMS:
    // name   - a string containing the name of the restaurant
    // desc   - a string containing a description of the restaurant
    // menu   - a string containing the restaurant's menu (menus are too variable to use a list)
    // hours  - an array containing strings of the restaurant's daily hours: 0-Sunday,...,6-Saturday
    // img_fn - a string containing the path of the restaurant's image file
function Restaurant(name, desc, menu, hours, img_fn) {
    this.name = name;
    this.desc = desc;
    this.menu = menu;
    this.hours = hours;
    this.img_fn = img_fn;

    this.displayCard = function(){
        var html = "<div><div class ='card' style='width:18rem'>";
        html +=        "<img src='"+this.img_fn+"' class='card-img-top' height='200' alt='image of "+this.name+"'>";
        html +=        "<div class='card-body'>";
        html +=             "<h5 class='card-title'>"+this.name+"</h5>";
        html +=             "<p class='card-text'>"+this.desc+"</p>";
        html +=             "<a href='#' class='btn btn-primary'>Learn more</a>";
        html +=        "</div>";
        html +=    "</div></div>";

        var tbl = document.getElementById("cardstable");
        tbl.innerHTML += html;
    };
}

var myRest = new Restaurant("Hello World Cafe","A charming, small cafe in the middle of grouds","menu","hours","ohill.jpg");

document.onreadystatechange = () => {
    if (document.readyState==='complete'){
        myRest.displayCard();
    }
};