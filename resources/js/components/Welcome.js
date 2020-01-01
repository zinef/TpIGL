import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
import './welcome.css';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';



export default class Welcome extends Component {
    render(){
        return(
        
            
            <div>
                <div className="topnav">
            
                
                    <div className="topnav-centered bg-secondary">
                    <a href="" >
                        <h1   >ESI Scolarity</h1>
                    </a>
                    </div>
                    
                    
                    
                
                    <div className="topnav-right text-white">

                    <Link to='/login' className="" >Suivant</Link>
                    {/* <Link to='/Enseignant/Note' className="" >about us</Link> */}
                    
                    

                      
                   
                    </div>
                    
                </div>
                    {/* <div className='centerDiv text-center text-white'> Esi Scolarity est une platform academique
                    pour les Enseignant ,les etudiant en l'adminstrastion</div>
                */}
          
                </div>
       
              

        );
    }
}
if (document.getElementById('welcome')) {
        ReactDOM.render(<Welcome/>, document.getElementById('welcome'));
}
    