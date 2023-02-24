import Container from "react-bootstrap/Container";
import Form from "react-bootstrap/Form";
import Nav from "react-bootstrap/Nav";
import Navbar from "react-bootstrap/Navbar";
import NavDropdown from "react-bootstrap/NavDropdown";
import Offcanvas from "react-bootstrap/Offcanvas";
import styled from "styled-components";
import React, { useState } from "react";
import { Link } from "react-router-dom";
import Logo from "../assets/images/logo.png";
import Text from "../assets/images/Pic.png";
import { useAuth } from "../Context/AuthContext";
import { useNavigate } from "react-router-dom";

const Pricing = styled.button`
  border-color: none;
  background-color: #8aaae5;
  border: none;
  border-radius: 10px;
  padding: 0.25em 0.7em;
  color: white;
  font-weight: bold;
`;

function OffcanvasExample() {
  const [isHovering, setIsHovering] = useState(false);

  const handleMouseEnter = () => {
    setIsHovering(true);
  };

  const handleMouseLeave = () => {
    setIsHovering(false);
  };

  // const [user] = useAuthState(auth)

  const [error, setError] = useState("");
  const { currentUser, logout } = useAuth();
  const navigate = useNavigate();

  async function handleLogout() {
    setError("");

    try {
      await logout();
      navigate("/signin");
    } catch {
      setError("Failed to log out");
    }
  }

  return (
    <>
      {["md"].map((expand) => (
        <Navbar key={expand} bg="transparent" expand={expand} className="mb-3">
          <Container style={{ maxWidth: "1200px" }}>
            <Navbar.Brand href="#">
              <span>
                <img src={Logo} style={{ width: "40px" }} />
                <img src={Text} style={{ marginLeft: "4px", width: "23px" }} />
              </span>
            </Navbar.Brand>
            <Navbar.Toggle aria-controls={`offcanvasNavbar-expand-${expand}`} />
            <Navbar.Offcanvas
              id={`offcanvasNavbar-expand-${expand}`}
              aria-labelledby={`offcanvasNavbarLabel-expand-${expand}`}
              placement="end"
            >
              <Offcanvas.Header closeButton>
                <Offcanvas.Title id={`offcanvasNavbarLabel-expand-${expand}`}>
                  <img src={Logo} />
                </Offcanvas.Title>
              </Offcanvas.Header>
              <Offcanvas.Body>
                <Nav className="justify-content-center flex-grow-1 pe-5 ">
                  <Link to="/">
                    <Nav.Link href="#action1">Home</Nav.Link>
                  </Link>
                  <Nav.Link href="#action2">Pricing</Nav.Link>
                  <Nav.Link href="#action2">Vector</Nav.Link>
                  <Nav.Link href="#action2">PSD</Nav.Link>

                  <NavDropdown
                    style={{ borderColor: "none" }}
                    title="More"
                    id={`offcanvasNavbarDropdown-expand-${expand}`}
                  >
                    <NavDropdown.Item href="#action4">
                      Illustration
                    </NavDropdown.Item>
                    <NavDropdown.Item href="#action4">
                      Photography
                    </NavDropdown.Item>
                  </NavDropdown>
                </Nav>
                <Form className="d-flex">
                  
                  {currentUser ? (
                    <NavDropdown
                    style={{ borderColor: "none" }}
                    title={currentUser.email}
                    id={`offcanvasNavbarDropdown-expand-${expand}`}
                  >
                    <NavDropdown.Item href="#action4">Profile</NavDropdown.Item>
                    <NavDropdown.Item href="#action4" onClick={handleLogout}>
                      Logout
                    </NavDropdown.Item>
                  </NavDropdown>
                  ) : (
                    <Link to="/signin">
                      <Pricing>Sign In</Pricing>
                    </Link>
                  )}
                </Form>
              </Offcanvas.Body>
            </Navbar.Offcanvas>
          </Container>
        </Navbar>
      ))}
    </>
  );
}

export default OffcanvasExample;
