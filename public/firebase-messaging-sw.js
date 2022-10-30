importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
   
firebase.initializeApp({
    apiKey: "AIzaSyBofYN7-qW0zO11WeeMo0o4Gbe4qy-46v8",
    authDomain: "sfghb-65a08.firebaseapp.com",
    projectId: "sfghb-65a08",
    messagingSenderId: "670553009664",
});
  
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function({data:{title,body,icon}}) {
    return self.registration.showNotification(title,{body,icon});
});