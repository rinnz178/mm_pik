import React, { useContext } from 'react';
import { Navigate} from 'react-router-dom';
import { AuthContext } from '../Context/AuthContext';

const PrivateRoute = ({ children }) => {

  const { currentUser } = useContext(AuthContext);

  if (!!currentUser) {
    return children
  }
  return <Navigate to='/' />

};

export default PrivateRoute;