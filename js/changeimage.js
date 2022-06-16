// triggers a click event on the input field for a images
// opens the data browser of the user
function changeImageClick() {
    document.querySelector('#profilePic').click();
}

function displayImage(e) {
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e) {
            document.querySelector('#profilePicDisplay').setAttribute('src', e.target.result);
        }

        reader.readAsDataURL(e.files[0]);
    }
    document.getElementById("saveImg").style.display = "block";
}