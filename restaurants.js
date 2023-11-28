// This function constructs a restaurant object. - PARAMS:
    // name   - a string containing the name of the restaurant
    // desc   - a string containing a description of the restaurant
        // NOTE: descriptions must be a certain length to make cards look even.
    // menu   - a string containing the restaurant's menu (menus are too variable to use a list)
    // hours  - an array containing strings of the restaurant's daily hours: 0-Sunday,...,6-Saturday
    // img_fn - a string containing the path of the restaurant's image file
function Restaurant(name, desc, menu, hours, img_fn) {
    this.name = name;
    this.desc = desc;
    this.menu = menu;
    this.hours = hours;
    this.img_fn = img_fn;

    // Displays the restaurant as a card in the "cardstable" div.
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

var restaurants = [
    new Restaurant("O'hill Dining Hall","Located near first year dormitories, O'hill has been a go-to for many UVA students.","menu",["1-5"],"ohill.jpg"),
    new Restaurant("Fresh Food Company","On the 2nd floor of Newcomb Hall, Newcomb is known for its iconic events such as Wing Wednesday.","menu",["1-5"],"newcomb.jpg"),
    new Restaurant("Runk Dining Hall","A popular spot, Runk has many unique stations such as a juice bar and smoothie stand.","menu",["1-5"],"runk.jpg")
]

var myRest = new Restaurant("Hello World Cafe","A charming, small cafe in the middle of grouds","menu","hours","ohill.jpg");

document.onreadystatechange = () => {
    if (document.readyState==='complete'){
        restaurants.forEach((restaurant) => {
            restaurant.displayCard();
        });
    }
};