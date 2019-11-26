import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
import EnsNav from './EnsNav';


export default class Enseignant extends Component {
    render() {
        return (
            <div className='large'>
            <EnsNav/> 
            
            </div>
             
             

          
          
        );
    }
    
}

if (document.getElementById('ens')) {
    ReactDOM.render(<Enseignant />, document.getElementById('ens'));
}
