$(document).ready(function () {
    const scheduleBody = document.getElementById("scheduleBody");
    const prevWeekButton = document.getElementById("prevWeek");
    const nextWeekButton = document.getElementById("nextWeek");
    const scheduleForm = document.getElementById("scheduleForm");
    let currentDate = new Date();
    let currentWeekOffset = 0;

    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
        const day = String(date.getDate()).padStart(2, '0'); // Pad single digits with leading zero
        return `${year}-${month}-${day}`; // Return the formatted date
    }

    function populateSchedule() {
        scheduleBody.innerHTML = "";
        const startDate = new Date(currentDate);
        startDate.setDate(startDate.getDate() + (currentWeekOffset * 7));

        for (let i = 0; i < 7; i++) {
            const date = new Date(startDate);
            date.setDate(startDate.getDate() + i);
            const day = date.toLocaleDateString('en-US', { weekday: 'long' });
            const formattedDate = formatDate(date); // Use the new formatDate function

            const row = document.createElement("tr");
            row.innerHTML = `
                <td class="scheduledata">
                    <input type="checkbox" name="selected_shift[]" value="${day}|${formattedDate}" class="date-checkbox"> ${day}
                </td>
                <td class="scheduledata">
                    <span>${formattedDate}</span>
                </td>
            `;

            scheduleBody.appendChild(row);
        }

        updateButtonVisibility();
    }

    function updateButtonVisibility() {
        prevWeekButton.style.display = currentWeekOffset > 0 ? 'inline-block' : 'none';
        nextWeekButton.style.display = currentWeekOffset < 1 ? 'inline-block' : 'none';
    }

    prevWeekButton.addEventListener("click", () => {
        if (currentWeekOffset > 0) {
            currentWeekOffset--;
            populateSchedule();
        }
    });

    nextWeekButton.addEventListener("click", () => {
        if (currentWeekOffset < 1) {
            currentWeekOffset++;
            populateSchedule();
        }
    });

    // Event listener for form submission
    scheduleForm.addEventListener('submit', function (event) {
        const selectedCheckboxes = document.querySelectorAll('input[name="selected_shift[]"]:checked');
        if (selectedCheckboxes.length === 0) {
            event.preventDefault();
            alert("Please select at least one date before submitting.");
        }
    });

    populateSchedule();
});
