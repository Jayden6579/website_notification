importScripts('https://www.gstatic.com/firebasejs/10.5.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/10.5.2/firebase-messaging.js');

var firebaseConfig = {
    apiKey: "AIzaSyBUQsN2MOSpeL863TAJ2ZTdhXHMJty8dAI",
    authDomain: "web-push-notification-sw-52871.firebaseapp.com",
    projectId: "web-push-notification-sw-52871",
    storageBucket: "web-push-notification-sw-52871.appspot.com",
    messagingSenderId: "216407897094",
    appId: "1:216407897094:web:7473d82f3c9a13f1b57f87",
    measurementId: "G-QF33DWXL33"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});