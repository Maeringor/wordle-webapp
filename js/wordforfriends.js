function copyToClipboard() {
    /* Get the text field */
    var copyText = document.getElementById("friendURL");
  
    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */
  
     /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
}

/* Return element value from id */
function returnValue(idFromElement) {
    return document.getElementById(idFromElement).value;
}

/* This method is used for en- and decrypting a user given word within a private link.
   Note that displacement must be a positive value and mode must be set to true for encrypting.
   Note that displacement must be a positive value and mode must be set to false for decrypting.
   Note also, a ceasar key will be gernerated for each session individually (see php/config.php -> CEASAR_KEY). */
function caesar_cipher(string, displacement, mode) {
	var returnArray = [], displacement = parseInt(displacement);
	if (typeof(string) === "string" && displacement > 0 && displacement < 26 && typeof(mode) === "boolean") {
		var stringParts = string.toUpperCase().split(""), alphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ".split(""), asNumbers = {};
		for (key in alphabet) {
			asNumbers[alphabet[key]] = parseInt(key);
		}
		for (var i = 0; i < stringParts.length; i++) {
			if (alphabet.indexOf(stringParts[i]) === -1) {
				return "";
			}
			returnArray.push(alphabet[(asNumbers[stringParts[i]] + (mode === true ? 1 : -1) * displacement + 26) % 26]);
		}
	}
	return returnArray.join("");
}