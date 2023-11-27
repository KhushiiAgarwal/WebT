$(document).ready(function () {
    const integerArray = [];
    const entityArray = [];

    
    
    function displayArrays() {
        $('#arrayResult').text('Array: [' + integerArray + ']');
        $('#sortResult').text('Sorted Array: [' + integerArray.slice().sort(function (a, b) {
            return a - b;
        }) + ']');
        $('#entityResult').text(`Named Entities: [${entityArray.join(', ')}]`);
    }

    // Add integers to the array
    $('#addInteger').click(function () {
        const value = $('#arrayInput').val().trim();
        if (value !== '') {
            const integers = value.split(',').map(num => parseInt(num));
            integerArray.push(...integers);
            $('#arrayInput').val('');
            displayArrays();
        }
    });

    // Sort the integer array
$('#sortArray').click(function () {
    integerArray.sort(function (a, b) {
        return a - b;
    });
    displayArrays();
});


    // Search for an integer in the array
    $('#searchArray').click(function () {
        const searchTerm = parseInt($('#searchInput').val().trim());
        const result = integerArray.includes(searchTerm) ? `Found ${searchTerm}` : 'Not found';
        $('#searchResult').text(`Search Result: ${result}`);
    });

    // Add named entities to the array
    $('#addEntity').click(function () {
        const entity = $('#entityInput').val().trim();
        if (entity !== '') {
            entityArray.push(entity);
            $('#entityInput').val('');
            displayArrays();
        }
    });
});
