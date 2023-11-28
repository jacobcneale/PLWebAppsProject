var ex = document.getElementById("exists");

if (typeof(Storage) !== "undefined") {
    var storageLength = localStorage.length;

    var container = document.getElementById("postsbox");

    if(storageLength == 0){
        ex.textContent = "No posts at the moment.";
    }
    else{
        ex.textContent = "";
    }

    for (var i = 0; i < storageLength; i=i+2) {
        var spanOuter = document.createElement("span");
        for(var x = i; x < storageLength && x < i + 2; x++){
            var key = localStorage.key(x);
            var formData = JSON.parse(localStorage.getItem(key));

            var span1 = document.createElement("span");

            var title = document.createElement("h4");
            title.textContent = formData.title;
            var user = document.createElement("label");
            user.textContent = "Created by " + formData.user ;
            var date = document.createElement("label");
            date.textContent = formData.date;
            var br = document.createElement("br");
            var story = document.createElement("p");
            story.textContent = formData.story;

            span1.appendChild(title);
            span1.appendChild(date);
            span1.appendChild(br);
            span1.appendChild(user);
            span1.appendChild(story);
            span1.classList.add("post");
            span1.style.display = "inline-block";
            span1.style.margin = "20px";
            span1.style.width = "40%";
            span1.style.height = "300px";
            span1.style.border = "1px solid black";
            span1.style.padding = "20px";
            span1.style.placeContent="center";

            spanOuter.appendChild(span1);
            spanOuter.style.display = "block"
        }
        container.append(spanOuter);
    }
} else {
    alert("Local storage is not supported in this browser.");
    ex.textContent="";
}