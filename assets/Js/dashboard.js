function getCurrentTime() {
    const now = new Date();
    const options = {
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: true,
        timeZone: 'Asia/Colombo' // Sri Lanka's timezone
    };
    return now.toLocaleTimeString('en-US', options);
}

function updateTime() {
    const timeElement = document.getElementById('time');
    if (timeElement) {
        timeElement.textContent = getCurrentTime();
    }
}

// Update time every second
setInterval(updateTime, 1000);

function getCurrentTime() {
    const now = new Date();
    const options = {
        hour: 'numeric',
        minute: 'numeric',
        second: 'numeric',
        hour12: true,
        timeZone: 'Asia/Colombo' // Sri Lanka's timezone
    };
    return now.toLocaleTimeString('en-US', options);
}
// Get date
function getCurrentDate() {
    const now = new Date();
    const options = {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    };
    return now.toLocaleDateString('en-GB', options); // Using 'en-GB' to ensure the date format DD/MM/YYYY
}

function updateDate() {
    const dateElement = document.getElementById('date');
    if (dateElement) {
        dateElement.textContent = getCurrentDate();
    }
}
// Update date
updateDate();

