import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './style.css';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
import Enseignant from './ens/Enseignant';

import Welcome from './Welcome';
import Login from './axiosREF/Login';
 
 



  

export default class Index extends Component {
   


constructor(props) {
    super(props);
    this.state = { user:"" };
  }

    render() {
     
        

        return (


  
 
<Router>

        <Route exact path='/Enseignant/Note'  ><Enseignant/>    </Route>
        
        <div className="container">
        <Route  exact path='/' >
          <Welcome/>
       
        </Route>
        <Route  exact path='/login' >
        
       
          <Welcome/>
       
          <Login/>
        
      

        
        </Route>
        </div>

        

    




</Router>
 
 



            );



}
                
    
}

if (document.getElementById('myapp')) {
    ReactDOM.render(<Index />, document.getElementById('myapp'));
}
