import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
import Note from './Note';
import AfficherNote from './AfficherNote';


export default class EnsNav extends Component {
    render() {
        return (
            <Router>
                <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
                        <Link className="navbar-brand" to="#">ESI</Link>
                        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span className="navbar-toggler-icon"></span>
                        </button>
                      
                        <div className="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul className="navbar-nav mr-auto">
                            <li className="nav-item active">
                              <Link className="nav-link" to="/Enseignant/EmploisTemp">Emplois de temps <span className="sr-only">(current)</span></Link>
                            </li>
                            <li className="nav-item">
                              <Link className="nav-link active" to="/Enseignant/Note">Affectation des note</Link>
                            </li>
                           
                            <li className="nav-item">
                              <Link className="nav-link active" to="/Enseignant/AfficherNote">Afficher les note</Link>
                            </li>
                           
                            
                          </ul>
                          <form className="form-inline my-2 my-lg-0">
                            <button className="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                          </form>
                        </div>
                      </nav>

                       <br/>
                      {/* Choisi un group <span>  </span>
                      <select name="niveau" class="btn btn-secondary dropdown-toggle btn-sm">

                          <option>1cpi </option>
                          <option selected="yes">2cpi</option>
                          <option>1CS</option>
                                      
                      </select>
                      <select name="group" class="btn btn-secondary dropdown-toggle btn-sm">

                          <option>g1 </option>
                          <option selected="yes">g2</option>
                          <option>g3</option>
                                          
                      </select>
                      <span> </span>
                      <button  className =" btn btn-outline-secondary"> charge la liste de groupe</button>
                      <br/><br/> */}
 


             
                    
                  
                
                
             


                
                <Route exact path='/Enseignant/Note' >
                    
                    <Note/>
                </Route>
                <Route exact path='/Enseignant/EmploisTemp' >
                    <div className="container">
                      <button>click sur ce bouton por telecharger votre emplois</button>
                    </div>                    
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
