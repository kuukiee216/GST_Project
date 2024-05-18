let adTypePrice = null;
let seasonalTypePrice = null;
let adTypeID = null;
let seasonalID = null;

function AddAdType(formId) {
    adTypeID = $(`#${formId} .btn-select.selected`).data('value');
    console.log("selectedAdType: ", adTypeID);

    if (adTypeID) {
        $.ajax({
            url: '../PHPFiles/Recruiter/get_adtype_price.php',
            type: 'POST',
            data: { adTypeID: adTypeID },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.Price) {
                    adTypePrice = result.Price;
                    console.log('AdType Price:', adTypePrice);
                    redirectToPaymentPage();
                } else {
                    console.error('Error:', result.error);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    } else {
        console.error('No AdType selected');
    }
}

function AddSeasonalType(formId) {
    seasonalID = $(`#${formId} .btn-selected.selected`).data('value');
    console.log("selectedSeasonalType: ", seasonalID);

    if (seasonalID) {
        $.ajax({
            url: '../PHPFiles/Recruiter/get_seasonal_price.php',
            type: 'POST',
            data: { seasonalID: seasonalID },
            success: function(response) {
                const result = JSON.parse(response);
                if (result.Price) {
                    seasonalTypePrice = result.Price;
                    console.log('Seasonal Type Price:', seasonalTypePrice);
                    redirectToPaymentPage();
                } else {
                    console.error('Error:', result.error);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    } else {
        console.error('No Seasonal Type selected');
    }
}

function redirectToPaymentPage() {
    if (adTypePrice !== null && seasonalTypePrice !== null) {
        const jobID = 34;  // Replace with the actual jobID
        const employerID = 1;  // Replace with the actual employerID
        const url = `create_jobadPAY.php?jobID=${jobID}&employerID=${employerID}&AdType=${adTypePrice}&Seasonal=${seasonalTypePrice}&adTypeID=${adTypeID}&seasonalID=${seasonalID}`;
        window.location.href = url;
    }
}

if (window.history.replaceState){
    window.history.replaceState(null, null, window.location.href);
}

function disableForm(formID){
    var form = document.getElementById(formID);
    var elements = form.elements;
    for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
            elements[elementCounter].disabled = true;
        }
    }
}

function enableForm(formID){
    var form = document.getElementById(formID);
    var elements = form.elements;
    for (var elementCounter = 0; elementCounter < elements.length; elementCounter++) {
        if(elements[elementCounter].tagName == 'INPUT' || elements[elementCounter].tagName == 'SELECT'){
            elements[elementCounter].disabled = false;
        }
    }
}
