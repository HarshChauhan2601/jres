document.getElementById('downloadButton').addEventListener('click', function () {
    // Get the HTML element you want to convert to PDF
    var element = document.body;

    // Use html2pdf library to generate PDF
    html2pdf(element);

});