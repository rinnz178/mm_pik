import React, { useState, useRef, useCallback } from "react";
import { Alert } from "react-bootstrap";
import "./style.css";
import { useAuth } from "../../Context/AuthContext";
import { useNavigate } from "react-router-dom";

const Signup = () => {
  const emailRef = useRef();
  const passwordRef = useRef();
  const passwordConfirmRef = useRef();
  const { signup } = useAuth();
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  const handleSubmit = useCallback(
    (e) => {
      e.preventDefault();

      if (passwordRef.current.value !== passwordConfirmRef.current.value) {
        return setError("Passwords do not match");
      }

      setError("");
      setLoading(true);
      signup(emailRef.current.value, passwordRef.current.value)
        .then(() => {
          navigate("/");
        })
        .catch((e) => {
          console.log(e);
          setError("Failed to register an account!");
        });

      setLoading(false);
    },
    [navigate, signup]
  );
  return (
    <div className="main">
      <section className="mt-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-6">
              <div class="wrap d-md-flex">
                <div class="login-wrap p-4 p-lg-5">
                  {error && <Alert variant="danger">{error}</Alert>}

                  <div class="d-flex">
                    <div class="w-100">
                      <h3 class="mb-4">Sign Up Form</h3>
                    </div>
                    <div class="w-100">
                      <p class="social-media d-flex justify-content-end">
                        <a
                          href="#"
                          class="social-icon d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="https://1.bp.blogspot.com/-S8HTBQqmfcs/XN0ACIRD9PI/AAAAAAAAAlo/FLhccuLdMfIFLhocRjWqsr9cVGdTN_8sgCPcBGAYYCw/s1600/f_logo_RGB-Blue_1024.png"
                            style={{ width: "38px" }}
                          />
                        </a>
                        <a
                          href="#"
                          class="social-icon d-flex align-items-center justify-content-center"
                        >
                          <img
                            src="https://www.shareicon.net/data/2016/07/10/119930_google_512x512.png"
                            style={{ width: "38px" }}
                          />
                        </a>
                      </p>
                    </div>
                  </div>
                  <form onSubmit={handleSubmit} class="signup-form">
                    <div class="form-group mb-3">
                      <label class="label" for="name">
                        Email
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Email"
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
                        ref={passwordRef}
                      />
                    </div>
                    <div class="form-group mb-3">
                      <label class="label" for="password">
                        Confirm Password
                      </label>
                      <input
                        type="password"
                        class="form-control"
                        placeholder="Confirm Password"
                        ref={passwordConfirmRef}
                      />
                    </div>
                    <div class="form-group">
                      <button
                        // type="submit"
                        class="form-control btn btn-primary  px-3"
                        type="submit"
                        disabled={loading}
                      >
                        Sign Up
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
                      Already have an account? Please{" "}
                      <span
                        onClick={() => navigate("/signin")}
                        style={{
                          color: "#293462",
                          fontWeight: "bold",
                          cursor: "pointer",
                        }}
                      >
                        sign in
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

export default Signup;
