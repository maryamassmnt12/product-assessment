// if ('serviceWorker' in navigator) {
//     window.addEventListener('load', function() {
//         navigator.serviceWorker.register('../../serviceworker.js')
//         .then(function(registration) {
//             console.log('ServiceWorker registration successful with scope: ', registration.scope);
//         }, function(error) {
//             console.log('ServiceWorker registration failed: ', error);
//         });
//     });
// }

// document.getElementById('btnNotify').addEventListener('click', () => {
//     if (Notification.permission === 'granted') {
//         showNotification();
//     } else if (Notification.permission !== 'denied') {
//         Notification.requestPermission().then(permission => {
//             if (permission === 'granted') {
//                 showNotification();
//             }
//         });
//     }
// });

// function showNotification() {
//     const notification = new Notification('Hello!', {
//         body: 'This is a notification from your PWA.',
//         icon: '/icons/icon-192x192.png'
//     });
// }
