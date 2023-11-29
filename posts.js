const title = document.getElementById("Title");
const message = document.getElementById("message");
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

function validateForm(){
    var regex = /\S/;
    if(!regex.test(title.value) || title.value==""){
        message.textContent="Please give the post a title.";
        return false;
    }
    if(!regex.test(textBox.value) || textBox.value==""){
        message.textContent="The post appears empty apart from the title.";
        return false;
    }
    return true;
}