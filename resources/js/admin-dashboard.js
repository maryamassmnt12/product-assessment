document.addEventListener('DOMContentLoaded', () => {
    
    const logoutBtn = document.getElementById('logout');

    if (logoutBtn) {
        logoutBtn.addEventListener('click', () => {
            console.log('Logout clicked');
        });
    }
    if (!window.Echo) {
        console.error('Echo not loaded');
        return;}

    window.Echo.join('presence-online')
        .here(users => {
            console.log('Online users:', users);
        })
        .joining(user => {
            console.log(user.name + ' joined');
        })
        .leaving(user => {
            console.log(user.name + ' left');
        })
        .error(error => {
            console.error('Presence channel error:', error);
        });


});
