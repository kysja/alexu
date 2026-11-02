// Dates in notes.json have no time, so format them in UTC to keep the day from shifting.
export function noteDate(date) {
    return new Date(date).toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        timeZone: 'UTC',
    });
}
