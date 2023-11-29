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

    // Displays the restaurant as a card in the "cardstable" div. Sets the 
    this.displayCard = function(){
        var html = "<div><div id='cardfor_"+this.img_fn+"' class ='card' style='width:18rem'>";
        html +=        "<img src='"+this.img_fn+"' class='card-img-top' height='200' alt='image of "+this.name+"'>";
        html +=        "<div class='card-body'>";
        html +=             "<h5 class='card-title'>"+this.name+"</h5>";
        html +=             "<p class='card-text'>"+this.desc+"</p>";
        html +=             "<button class='btn btn-primary'>Learn more</button>";
        html +=        "</div>";
        html +=    "</div></div>";

        var tbl = document.getElementById("cardstable");
        tbl.innerHTML += html;
    };

}

var oHillHours = ["7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm"];
var newcHours = ["7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm"];
var runkHours = ["7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm","7am-8pm"];
var restaurants = [
    new Restaurant("O'hill Dining Hall","Located near first year dormitories, O'hill has been a go-to for many UVA students.","eggs, burgers, fries, salad bar, sandwich bar",oHillHours,"ohill.jpg"),
    new Restaurant("Fresh Food Company","On the 2nd floor of Newcomb Hall, Newcomb is known for its iconic events such as Wing Wednesday.","eggs, burgers, fries, salad bar, sandwich bar",newcHours,"newcomb.jpg"),
    new Restaurant("Runk Dining Hall","A popular spot, Runk has many unique stations such as a juice bar and smoothie stand.","eggs, burgers, fries, salad bar, sandwich bar",runkHours,"runk.jpg")
];

var myRest = new Restaurant("Hello World Cafe","A charming, small cafe in the middle of grouds","menu","hours","ohill.jpg");

document.onreadystatechange = () => {
    if (document.readyState==='complete'){
        restaurants.forEach((restaurant) => {
            restaurant.displayCard();
        });
        restaurants.forEach((restaurant)=>{
            var card = document.getElementById("cardfor_"+restaurant.img_fn);
            var button = card.getElementsByClassName("btn-primary")[0];
            var image = card.getElementsByClassName('card-img-top')[0];
            var text = card.getElementsByClassName('card-text')[0];
            button.addEventListener("click",function(){
                if (button.innerHTML==="Learn more"){
                    text.innerHTML = "<b>Description: </b>" + restaurant.desc +"<br>";
                    text.innerHTML +="<b>Menu: </b>" + restaurant.menu + "<br>";
                    text.innerHTML +="<b>Hours: </b><br>";
                    text.innerHTML +="Sunday: " + restaurant.hours[0] + "<br>";
                    text.innerHTML +="Monday: " + restaurant.hours[1] + "<br>";
                    text.innerHTML +="Tuesday: " + restaurant.hours[2] + "<br>";
                    text.innerHTML +="Wednesday: " + restaurant.hours[3] + "<br>";
                    text.innerHTML +="Thursday: " + restaurant.hours[4] + "<br>";
                    text.innerHTML +="Friday: " + restaurant.hours[5] + "<br>";
                    text.innerHTML +="Saturday: " + restaurant.hours[6] + "<br>";
                    button.innerHTML = "Show less";
                }
                else if (button.innerHTML==="Show less"){
                    text.innerHTML = restaurant.desc;
                    button.innerHTML="Learn more";
                }
            });
        });
    }
};
