$(document).ready(function(){  
    var firebaseConfig = {
        apiKey: "AIzaSyB7hXDUdKvU-61w1qFKSk9wfC5z625TGIk",
        authDomain: "fujadovirus.firebaseapp.com",
        databaseURL: "https://fujadovirus.firebaseio.com",
        projectId: "fujadovirus",
        storageBucket: "fujadovirus.appspot.com",
        messagingSenderId: "785278748879",
        appId: "1:785278748879:web:e3a8a527be23fa1f118fba",
        measurementId: "G-88WDV3LHYL"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
      firebase.analytics();
      var dbReference = firebase.database().ref().child('recordes');

      dbReference.on('value', callback => preenche_campo(callback.val()));
    
});

function preenche_campo(callback) {
  var recorde = callback.dificil.recorde + ' Dias <br/>' + callback.dificil.nome;
  $('#recorde-atual').html(recorde);
}