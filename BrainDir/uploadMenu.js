$(document).ready(function () {
    var cc = 0;

    // Select the #uploadMenu element
    const resultText = document.getElementById("status");
    const uploadButton = document.getElementById("uploadButton");
    const uploadMenu = document.getElementById("uploadMenu");
    const inputLable = document.getElementById("inputLable");
    const loaded = document.getElementById("amountLoaded");
    const uploadLable = document.getElementById("uploadLable");

    // Add a click event listener to the uploadMenu element
    uploadButton.addEventListener("click", function (x) {
        // your code logic here
        cc++;
        if (cc == 1) {
            loaded.classList.remove("hide");
            uploadLable.classList.add("uploadLableActive")
            uploadMenu.classList.remove("uploadMenu");
            uploadMenu.classList.add("uploadMenuOpen");
            inputLable.classList.remove("hide");
            resultText.style.color = "bisque";
            
            
        } else if (cc == 2) {
            cc = 0;
            
            loaded.classList.add("hide");
            uploadLable.classList.remove("uploadLableActive")
            uploadMenu.classList.add("uploadMenu");
            uploadMenu.classList.remove("uploadMenuOpen");
            inputLable.classList.add("hide");
            resultText.style.color = "transparent";
            
        }
    });
});


//your solution is great, focus on toggle that part. Instead of giving everytime a "style" you can change the class of the element.
//for that you should make a class in css and give it to the element with classList.add("className") and remove it with classList.remove("className")
