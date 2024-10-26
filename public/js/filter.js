document.getElementById('availableDate').addEventListener('change', filterDoctors);
document.getElementById('doctorID').addEventListener('change', filterTimes);

function filterDoctors() {
    var selectedDate = document.getElementById('availableDate').value;
    var doctorSelect = document.getElementById('doctorID');

    // Reset doctor options
    for (var i = 0; i < doctorSelect.options.length; i++) {
        doctorSelect.options[i].style.display = 'none'; // Hide all options initially
    }

    // Show only doctors with the matching date
    for (var i = 0; i < doctorSelect.options.length; i++) {
        var availableDates = JSON.parse(doctorSelect.options[i].getAttribute('data-available-dates'));

        if (availableDates.includes(selectedDate)) {
            doctorSelect.options[i].style.display = ''; // Show the doctor if the date matches
        }
    }
}

function filterTimes() {
    var doctorSelect = document.getElementById('doctorID');
    var selectedDoctorID = doctorSelect.value;
    var selectedOption = doctorSelect.options[doctorSelect.selectedIndex];
    var timeEnd = selectedOption.getAttribute('data-time-end');

    // Populate the available times dropdown up to the doctor's end time
    var timeSelect = document.getElementById('availableTime');
    timeSelect.innerHTML = ''; // Clear previous times

    var startTime = 8; // Assuming the clinic starts appointments at 8 AM
    var endTime = parseInt(timeEnd.split(':')[0]); // Convert end time to an integer

    for (var i = startTime; i < endTime; i++) {
        var timeOption = document.createElement('option');
        var formattedTime = i < 10 ? '0' + i + ':00' : i + ':00';
        timeOption.value = formattedTime;
        timeOption.text = formattedTime;
        timeSelect.appendChild(timeOption);
    }
}