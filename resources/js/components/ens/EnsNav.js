import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
import Note from './Note';
import AfficherNote from './AfficherNote';
import Profile from './Profile';
import  '../style.css';


export default class EnsNav extends Component {
  constructor(props){
    super(props);

  }
    render() {
        return (
            <Router>

                <nav className="navbar navbar-expand-lg navbar-dark bg-primary padding-0">
                        <a className="navbar-brand bgfont" href="/">ESI</a>
                        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span className="navbar-toggler-icon"></span>
                        </button>
                      
                        <div className="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul className="navbar-nav mr-auto">
                            <li className="nav-item active">
                              <Link className="nav-link mdfont  " to="/Enseignant/Profile">Profile <span className="sr-only">(current)</span></Link>
                            </li>
                            <li className="nav-item">
                              <Link className="nav-link active mdfont" to="/Enseignant/Note">Affectation des note</Link>
                            </li>
                           
                            <li className="nav-item">
                              <Link className="nav-link active mdfont" to="/Enseignant/AfficherNote">Afficher les note</Link>
                            </li>
                           
                            
                          </ul>
                         
                        </div>
                      </nav>

                       <br/>
                     
 


             
                    
                  
                
                
             


                
                <Route exact path='/Enseignant/Note' >
                    
                    <Note/>
                </Route>
                <Route exact path='/Enseignant/Profile' >
                   <Profile/>                   
                </Route>
                <Route exact path='/Enseignant/AfficherNote' >
                    
                    <AfficherNote/>
                </Route>
           </Router>
            
          
        );
    }
    
}

if (document.getElementById('ensNav')) {
    ReactDOM.render(<EnsNav />, document.getElementById('ensNav'));
}
