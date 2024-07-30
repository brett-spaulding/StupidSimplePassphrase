// Word Slider OnChange - Vanilla Style
const slider = document.getElementById("wordRange");
const output = document.getElementById("wordRangeValue");
output.innerHTML = slider.value;

slider.oninput = function () {
    output.innerHTML = this.value;
}

// Copy to Clipboard - Vanilla Style
function copyToClipboard(text) {
    if (navigator.clipboard && window.isSecureContext) {
        console.log('Copied to clipboard!');

        Toastify({
            text: "Copied to clipboard!",
            duration: 5000,
            close: true,
            gravity: "bottom", // `top` or `bottom`
            position: "center", // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();

        return navigator.clipboard.writeText(text);
    } else {
        // TODO: Use the old commandExec() way
    }
}

const copyButton = document.getElementById('actionCopy');
copyButton.addEventListener('click', function () {
    let textToCopy = document.getElementById('passwordOutput').value;
    copyToClipboard(textToCopy);
});

// Ajax request to server - jQuery Style
const passwordForm = $('#passwordGeneratorForm');
const passwordOutput = $('#passwordOutput');
const actionRegenerate = $('#actionRegenerate');
actionRegenerate.on('click', (ev) => {
    ev.preventDefault();
    let formData = passwordForm.serialize();
    $.ajax({
        url: '/generatePassword',
        method: 'POST',
        data: formData,
        success: (response) => {
            console.log(response);
            passwordOutput.val(response);
        },
        error: (response) => {
            console.log(response);
            Toastify({
                text: `${response.statusText} ${response.status}: ${response.responseJSON.message}`,
                // duration: 5000,
                close: true,
                gravity: "bottom",
                position: "center",
                stopOnFocus: true,
                  style: {
                    background: "linear-gradient(108.4deg, rgb(253, 44, 56) 3.3%, rgb(176, 2, 12) 98.4%)",
                  }
            }).showToast();
        }
    })
});

// Click on start
actionRegenerate.click();
