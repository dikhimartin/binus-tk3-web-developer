function formatDate(dateString) {
    var options = { day: '2-digit', month: '2-digit', year: 'numeric' };
    var date = new Date(dateString);
    return date.toLocaleDateString('en-GB', options);
}