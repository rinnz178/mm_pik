import { faDownload, faEye,faCrown } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import React, { useState, useEffect } from "react";
import "./style.css";
import Image from "../../assets/images/img.jpg";
import { Link } from "react-router-dom";
import http from "../../http";

const Content = () => {
  const [order, setOrders] = useState([]);

  useEffect(() => {
    fetchAllContents();
  }, []);

  const fetchAllContents = () => {
    http.get("/home").then((res) => {
      setOrders(res.data);
    });
  };
  return (
    // <Link Link to="/detail">
    <div>
      {order.map((orders, index) => (
            <div className="img col-lg-3 col-6 col-md-4 col-sm-6 " style={{backgroundColor:'none'}}>
                {
                  (orders.status = 1 ? (
                    <div class="overlay">
                      <FontAwesomeIcon
                        style={{ color: "white" }}
                        icon={faCrown}
                      />
                    </div>
                  ) : null)
                }
              <img
                style={{
                  borderRadius: "10px",
                  cursor: "pointer",
                  width: "100%",
                }}
                src={`http://localhost:8000/cover/${orders.photo}`}
                className="responsive"
                alt="..."
              />
              <div className="text">
                <div>{orders.name}</div>
              </div>
            </div>
          ))}
    </div>
  );
};

export default Content;
