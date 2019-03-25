function intervalToText(date) {
    let diff = ((new Date()).getTime() - date.getTime()) / 1000;

    if (diff < 0) {
        return 'in the future';
    } else if (diff < 10) {
        return 'just now';
    } else if (diff < 60) {
        return parseInt(diff, 10) + ' seconds ago';
    } else if (diff < 120) {
        return 'a minute ago';
    } else if (diff < 60 * 60) {
        return parseInt(diff / 60, 10) + ' minutes ago';
    } else if (diff < 60 * 60 * 2) {
        return 'an hour ago';
    } else if (diff < 60 * 60 * 24) {
        return parseInt(diff / (60 * 60), 10) + ' hours ago';
    } else if (diff < 2 * 60 * 60 * 24) {
        return 'a day ago';
    } else {
        return parseInt(diff / (60 * 60 * 24), 10) + ' days ago';
    }
}

export default intervalToText;
