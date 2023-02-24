import React, { useState, useEffect } from "react";
import "./App.css";
import "bootstrap/dist/css/bootstrap.min.css";
import Home from "./pages/Home/index";
import Nav from "./components/Nav";
import Footer from "./components/Footer";
import {
  BrowserRouter as Router,
  Navigate,
  Route,
  Routes,
} from "react-router-dom";
import SignIn from "./pages/SignIn";
import Signup from "./pages/SignUp";
import NoPage from "./pages/NoPage";
import Logo from "./assets/images/logo.png";
import "./assets/loading.css";
// import { auth } from './firebase.js'
import { AuthProvider, useAuth } from "./Context/AuthContext";
import PrivateRoute from "./PrivateRoute";
import Detail from "../src/pages/Detail";

function App() {
  // const [currentUser] = useAuth()
  // const [user] = useAuthState(auth)

  const [loading, setLoading] = useState(false);
  useEffect(() => {
    setLoading(true);
    setTimeout(() => {
      setLoading(false);
    }, 2000);
  }, []);
  return (
    <div>
      {loading ? (
        <div className="loader-container">
          <div className="spinner">
            <img src={Logo} style={{ width: "50px" }} />
          </div>
        </div>
      ) : (
        <div className="fnt">
          <AuthProvider>
            <Router>
              <Nav />
              <Routes>
                <Route exact path="/" element={<Home />} />
                <Route path="/signin" element={<SignIn />} />
                <Route path="/signup" element={<Signup />} />
                <Route path="/detail" element={<Detail />} />
                <Route path="*" element={<NoPage />} />
              </Routes>
            </Router>
          </AuthProvider>
          <Footer />
        </div>
      )}
    </div>
  );
}

export default App;
