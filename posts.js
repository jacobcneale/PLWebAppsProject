
if (typeof(Storage) !== "undefined") {
    function submitForm() {
        var user = "Jacob Neale"
        var title = document.getElementById("title").value;
        var story = document.getElementById("story").value;

        var formData = {
            user: user,
            title: title,
            story: story,
        };

        if (title.trim() === "" || story.trim() === "") {
            alert("Please fill in all required fields.");
            return;
        }

        localStorage.setItem("formData", JSON.stringify(formData));
        window.location.href = "explore.html";
    }
} else {
    alert("Local storage is not supported in this browser.");
}

const textBox = document.getElementById("story");
const wordCount = document.getElementById("wordcount");

// Add an input event listener to the textarea
textBox.addEventListener("input", updateWordCount);

function updateWordCount() {
    const text = textBox.value;
    const words = text.split(/\s+/);
    const filteredWords = words.filter(word => word.trim() !== "");
    wordCount.textContent = filteredWords.length+" words";
}