import React, { useState, useRef } from "react";
import "./style.css";
import { Link, useNavigate } from "react-router-dom";
import { useAuth } from "../../Context/AuthContext";
import { Alert } from "react-bootstrap";

const Signin = () => {
  const emailRef = useRef();
  const passwordRef = useRef();
  const { login } = useAuth();
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  async function handleSubmit(e) {
    e.preventDefault();

    try {
      setError("");
      setLoading(true);
      await login(emailRef.current.value, passwordRef.current.value);
      navigate("/");
    } catch {
      setError("Failed to log in");
    }

    setLoading(false);
  }
  // function signInWithGoogle() {
  //   const provider = new firebase.auth.GoogleAuthProvider();
  //   auth.signInWithPopup(provider);
  // }
  return (
    <div className="main">
      <section class="mt-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
              <div class="wrap d-md-flex">
                <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                  <div class="text w-100">
                    <h2>Welcome to login</h2>
                    <p>Don't have an account?</p>
                    <Link to="/signup">
                      <span class="btn btn-white btn-outline-white">
                        Sign Up
                      </span>
                    </Link>
                  </div>
                </div>
                <div class="login-wrap p-4 p-lg-5">
                  <div class="d-flex">
                    <div class="w-100">
                      {error && <Alert variant="danger">{error}</Alert>}
                      <h3 class="mb-4">Log In Form</h3>
                    </div>
                    <div class="w-100">
                      <p class="social-media d-flex justify-content-end">
                        <span
                          // onClick={signInWithGoogle}
                          href="#"
                          class="social-icon d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="https://1.bp.blogspot.com/-S8HTBQqmfcs/XN0ACIRD9PI/AAAAAAAAAlo/FLhccuLdMfIFLhocRjWqsr9cVGdTN_8sgCPcBGAYYCw/s1600/f_logo_RGB-Blue_1024.png"
                            style={{ width: "38px" }}
                          />
                        </span>
                        <span
                          href="#"
                          class="social-icon d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="https://www.shareicon.net/data/2016/07/10/119930_google_512x512.png"
                            style={{ width: "38px" }}
                          />
                        </span>
                      </p>
                    </div>
                  </div>
                  <form  onSubmit={handleSubmit} class="signin-form">
                    <div class="form-group mb-3">
                      <label class="label" for="name">
                        Email
                      </label>
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Email"
                        required
                        ref={emailRef}
                      />
                    </div>
                    <div class="form-group mb-3">
                      <label class="label" for="password">
                        Password
                      </label>
                      <input
                        type="password"
                        class="form-control"
                        placeholder="Password"
                        required
                        ref={passwordRef}
                      />
                    </div>

                    <div class="form-group">
                      <button
                        type="submit"
                        disabled={loading}
                        class="form-control btn btn-primary submit px-3 font-weight-bold"
                      >
                        Log In
                      </button>
                    </div>
                    <div class="form-group d-md-flex">
                      <div class="w-50 text-left">
                        <label class="checkbox-wrap checkbox-primary mb-0">
                          Remember Me
                          <input type="checkbox" checked />
                          <span class="checkmark"></span>
                        </label>
                      </div>
                      <div class="w-50 text-md-right">
                        <a href="#">Forgot Password</a>
                      </div>
                    </div>
                    <div style={{ fontSize: "12px", textAlign: "center" }}>
                      Dont't have an account? Register{" "}
                      <span
                      onClick={() => navigate("/signup")}
                        style={{
                          color: "#293462",
                          fontWeight: "bold",
                          cursor: "pointer",
                        }}
                      >
                        here
                      </span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Signin;
