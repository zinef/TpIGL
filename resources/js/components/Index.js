import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './style.css';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';
import Enseignant from './ens/Enseignant';
import D from './D';
 



  

export default class Index extends Component {
   


constructor(props) {
    super(props);
    this.state = { user:"" };
  }

    render() {
     
        

        return (
 <div  > 
 
<Router>
        <Route exact path='/Enseignant/Note'  ><Enseignant/>    </Route>
        
        <div className="container">
        <Route  exact path='/' >
        <br/>
        <br/>
        <Link className="btn  btn-primary lbtn" onClick={()=>{this.setState({user : new URLSearchParams(window.location.search).get('p')})}} to="/?p=admin">Administrateur</Link>
        <Link className="btn btn-primary lbtn" onClick={()=>{this.setState({user : new URLSearchParams(window.location.search).get('p')})}}  to="/?p=Enseignant">Enseignant<span className="sr-only">(current)</span></Link>
        <Link className="btn btn-primary lbtn"  onClick={()=>{this.setState({user : new URLSearchParams(window.location.search).get('p')})}}  to="/?p=Etudiant">Etudiant <span className="sr-only">(current)</span></Link>
       
         
     
    
               
               
        

                 
                
        <D/>
        <Link to='/Enseignant/Note' className="btn btn-secondary" > login</Link>
        {/* <form>
            <div className="form-group">
                <label >Email address</label>
                <input type="email" className="form-control"  
                aria-describedby="emailHelp" 
                placeholder="Enter email"/>
            </div>
            <div className="form-group">
                <label >Password</label>
                <input type="password" className="form-control"  placeholder="Password"/>
            </div>
            <div className="form-group form-check">
                <input type="checkbox" className="form-check-input" id="exampleCheck1"/>
                <label className="form-check-label" >Check me out</label>
            </div>
            
            <Link to='/Enseignant/Note' className="btn btn-secondary" > login</Link>
            
        </form> */}

        
        </Route>
        </div>

        

    




</Router>
</div>


            );



}
                
    
}

if (document.getElementById('myapp')) {
    ReactDOM.render(<Index />, document.getElementById('myapp'));
}
