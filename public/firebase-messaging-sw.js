importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyDZt_BNVc8BdPyB6vXXa2_mYsWJ16U5xk0",
    projectId: "clean-65e66.firebaseapp.com",
    messagingSenderId: "626347597331",
    appId: "1:626347597331:web:d2a3569baba80eab7029e6"
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});
