import React from "react";
import "./style.css";

const Footer = () => {
  return (
    <div>
      <div class="footer">
        <div className="container">
          <div className="row">
            <div className="col-lg-4 col-md-6 col-6 p-3">
              <span style={{ fontSize: "20px", fontWeight: "bold" }}>
                Information
              </span>
              <div>Pricing</div>
              <div>About us</div>
              <div>Business</div>
              <div>Sell your content</div>
            </div>
            <div className="col-lg-4 col-md-6 col-6 p-3">
              <span style={{ fontSize: "20px", fontWeight: "bold" }}>
                Legal
              </span>
              <div>T&C</div>
              <div>Privacy policy</div>
              <div>Copyright information</div>
            </div>
            <div className="col-lg-4 col-md-12 p-3">
              <span style={{ fontSize: "20px", fontWeight: "bold" }}>
                SUPPORT
              </span>
              <div>FAQ</div>
              <div>Contact us</div>
            </div>
            <div className="col-12">
              <p>Copyright © 2022 MPic. All rights reserved</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Footer;
