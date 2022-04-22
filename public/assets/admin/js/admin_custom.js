var image = document.getElementById('image');
if (image) {
    image.addEventListener('change', function(event) {
        var old_image = document.getElementById('old_image');
        if (old_image) {
            old_image.classList.add('d-none');
        }
        var new_image = document.getElementById('new_image');
        new_image.classList.remove('d-none');
        var reader = new FileReader();
        reader.onload = function() {
            new_image.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    });
}
var country_id = document.getElementById('country_id');
if (country_id) {
    writeCountryCode();
    country_id.addEventListener('change', function(event) {
        event.preventDefault();
        writeCountryCode();
    });

    function writeCountryCode() {
        let selectedOption = country_id.options[country_id.selectedIndex];
        var phone_code = document.getElementsByClassName('phone-code');
        if (selectedOption.value == "") {
            if (phone_code.length > 1) {
                for (i = 0; i < phone_code.length; i++) {
                    phone_code[i].innerHTML = "+0";
                }
            } else {
                phone_code.innerHTML = "+0";
            }

        } else {
            if (phone_code.length > 1) {
                for (i = 0; i < phone_code.length; i++) {
                    phone_code[i].innerHTML = "+" + selectedOption.dataset.code;
                }
            } else {
                phone_code.innerHTML = "+" + selectedOption.dataset.code;
            }
        }
    }
}