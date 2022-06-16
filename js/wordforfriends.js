function copyToClipboard() {
    /* Get the text field */
    var copyText = document.getElementById("friendURL");
  
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
  
     /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
}

function returnValue(){
    return document.getElementById("custom").value;
}