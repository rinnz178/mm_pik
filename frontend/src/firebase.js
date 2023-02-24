import firebase from "firebase/compat/app";
import "firebase/compat/auth";

const app = firebase.initializeApp({
  apiKey: "AIzaSyDmUo9UlY92iAMCPAIGUie2ky6mEbzP8AE",
  authDomain: "restaurant-app-6a32a.firebaseapp.com",
  projectId: "restaurant-app-6a32a",
  storageBucket: "restaurant-app-6a32a.appspot.com",
  messagingSenderId: "516838368754",
  appId: "1:516838368754:web:522c9a18faa3c13d7ab76b",
});

export const auth = app.auth();
export default app;
