import styled from "styled-components";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faSearch } from "@fortawesome/free-solid-svg-icons";
import Card from "./Content";
import React, { useContext, useEffect, useState } from "react";
import { useAuth } from "../../Context/AuthContext";
import { useNavigate } from "react-router-dom";
import http from "../../http";
import { faDownload, faEye, faCrown } from "@fortawesome/free-solid-svg-icons";
import "./style.css";
const Header = styled.h2`
  text-align: center;
  font-weight: "800";
  font-size: 45px;
  @media (max-width: 768px) {
    font-size: 30px;
  }
`;
const Description = styled.p`
  font-size: 15px;
  text-align: center;
  ${"" /* width: 100%; */}
  margin: auto;
  color: gray;
  margin-top: 10px;
`;

const Tab = styled.button`
  font-size: 16px;
  background-color: #fefefe;
  padding: 10px 10px;
  cursor: pointer;
  opacity: 0.6;
  border: 0;
  outline: 0;
  ${({ active }) =>
    active &&
    `
    border-bottom: 1.2px solid #8AAAE5;
    background-color:#FEFEFE;
    opacity: 1;
    color: #8AAAE5;
    font-weight:bold;
    ${"" /* transition: 0.3s; */}
  `}
`;
const ButtonGroup = styled.div`
  display: flex;
`;
const types = ["Latest", "Popular", "Premium", "Free"];

const Home = () => {
  const handleKeyDown = (event) => {
    console.log("User pressed: ", event.key);

    // console.log(message);

    if (event.key === "Enter") {
      // 👇️ your logic here
      alert("Search Function is work!");
    }
  };
  const sayHello = () => {
    alert("Hello!");
  };
  const [active, setActive] = useState(types[0]);

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
    <div style={{ maxWidth: "1200px", margin: "auto" }}>
      <Header className="text-align-center">Pupular Stock Vectors</Header>
      <Description>
        High quality Vectors with worry-free <br /> licensing for personal and
        commercial use.
      </Description>
      <div className="col-10 col-sm-7 col-md-7 col-lg-4 mx-auto mt-4">
        <div class="row">
          <div class="input-group">
            <input
              onKeyDown={handleKeyDown}
              style={{
                height: "6vh",
                backgroundColor: "white",
                boxShadow: "0px 1px 4px 0px #8AAAE5",
              }}
              className="form-control border rounded-pill"
              type="search"
              placeholder="Search Vectors"
            />
            <span
              className="btn search"
              onClick={() => alert("Search Function is work!")}
              style={{ border: "none" }}
            >
              <FontAwesomeIcon
                style={{ fontWeight: "bolder" }}
                icon={faSearch}
              />
            </span>
          </div>
        </div>
      </div>
      <div className="mt-4 container">
        <ButtonGroup>
          {types.map((type) => (
            <Tab
              key={type}
              active={active === type}
              onClick={() => setActive(type)}
            >
              {type}
            </Tab>
          ))}
        </ButtonGroup>
        <p />
      </div>
      <div className="container">
        {/* <div className="row"> */}
        <div
          className="row"
          // className="col-lg-3 col-6 col-md-4 col-sm-6 mx-auto "
          style={{
            flexDirection: "row",
            flex: "wrap",
            justifyContent: "flex-start",
            maxHeight:'300px'
          }}
        >
          {order.map((orders, index) => (
            <div
              className="img_card col-lg-3 col-6 col-md-4 col-sm-6 "
              style={{ backgroundColor: "none" }}
            >
              {
                (orders.status === 1 ? (
                  <div class="overlay">
                    <FontAwesomeIcon
                      style={{ color: "orange", }}
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
                  backgroundColor:'none',
                  maxHeight:'300px',
                  maxWidth:'300px'
                }}
                src={`http://localhost:8000/cover/${orders.photo}`}
                className="responsive img_img"
                alt="..."
              />
              <div className="text">
                <div>{orders.name}</div>
              </div>
            </div>
          ))}
          {/* </div> */}
        </div>
      </div>
      <div className="mt-3">
        <nav aria-label="Page navigation example">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link">Previous</a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                1
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                2
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                3
              </a>
            </li>
            <li class="page-item">
              <a class="page-link" href="#">
                Next
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  );
};

export default Home;
