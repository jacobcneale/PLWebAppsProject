const title2 = document.getElementById("Title2");
const message2 = document.getElementById("message2");
const textBox2 = document.getElementById("story2");
const wordCount2 = document.getElementById("wordcount2");

textBox2.addEventListener("input", updateWordCount2);

function updateWordCount2() {
    const text2 = textBox2.value;
    const words2 = text2.split(/\s+/);
    const filteredWords2 = words2.filter(word => word.trim() !== "");
    wordCount2.textContent = filteredWords2.length+" words";
}

function validateEdit(){
    var regex = /\S/;
    if(!regex.test(title2.value) || title2.value==""){
        message2.textContent="Please give the post a title.";
        return false;
    }
    if(!regex.test(textBox2.value) || textBox2.value==""){
        message2.textContent="The post appears empty apart from the title.";
        return false;
    }
    return true;
}