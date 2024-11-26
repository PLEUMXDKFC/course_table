document.getElementById("filterForm").addEventListener("change", function() {
    var year = document.getElementById("yearSelect").value;
    var level = document.getElementById("levelSelect").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "path_to_php_file.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("dataTable").getElementsByTagName("tbody")[0].innerHTML = xhr.responseText;
        }
    };

    xhr.send("year=" + year + "&level=" + level);
});

document.getElementById('yearSelect').addEventListener('change', function() {
    var year = this.value;
    var semesterSelect = document.getElementById('semesterSelect');
    var options = semesterSelect.getElementsByTagName('option');
    
    // Reset all options visibility to show 5 and 6
    for (var i = 0; i < options.length; i++) {
        options[i].style.display = 'block';
    }
    
    // If 'ปวส.' or 'ปวส. ม.6' is selected, hide options 5 and 6
    if (year === 'ปวส.' || year === 'ปวส. ม.6') {
        options[2].style.display = 'none'; // Hide option 5, which is index 2 (value="5,6")
    }
});