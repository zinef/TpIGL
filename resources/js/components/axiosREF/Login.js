import React, { Component } from 'react'
import ReactDOM from 'react-dom';
import axios from 'axios';
import {BrowserRouter as Router,Link,Route} from 'react-router-dom';

class Login extends Component {
  constructor (props) {
    super(props)
    this.state = {
      username: '',
      password: ''
    }
  
    this.onChangeValue = this.onChangeValue.bind(this);
    this.onSubmitButton = this.onSubmitButton.bind(this);
  }
   
    onChangeValue(e) {
        this.setState({
            [e.target.name]: e.target.value
        });
    }
  
    onSubmitButton(e) {
     e.preventDefault();//**** */
        
   
        axios.post('/', {
            username: this.state.username,
            password: this.state.password
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });
        
     
    }
   
  componentDidMount () {
  }
  userPrint(e){
      this.setState({typeuser: e.target.name});
     
      document.getElementById('res').innerHTML=e.target.name;
  }
   
  render () {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="centerDiv">
                    <div className="card  " style={{background : 'rgba(60,60,60,0.8)',
                                    color:"white",width: '613px'}}>
                        <div className="card-header">
                                    <div className="centerDiv">
                                        <div className="centerDiv">
                                        <button className="btn  btn-primary lbtn " onClick={this.userPrint.bind(this)} name="Administrateur"  >Administrateur</button>
                                        <button className="btn btn-primary lbtn"onClick={this.userPrint.bind(this)} name="Enseignant" >Enseignant<span className="sr-only">(current)</span></button>
                                        <button className="btn btn-primary lbtn"  onClick={this.userPrint.bind(this)}  name="Etudiant" >Etudiant <span className="sr-only">(current)</span></button>
                                        </div> 

                                        <h2  className="text-center" style={{marginTop:'4px'}}>Sign as <span id="res"></span></h2>
                
                    
                                    </div>
                        </div>
   
                        <div className="card-body" >
                            <form onSubmit={this.onSubmitButton}>
                                <strong>Username :</strong>
                                <input type="text" name="username" className="form-control" value={this.state.username} onChange={this.onChangeValue} />
                                <strong>Password :</strong>
                                <input className="form-control " name="password" value={this.state.password} onChange={this.onChangeValue}/>
                                <Link to='/Enseignant/Note' className="btn btn-success" style={{marginTop:'10px'}} > Login</Link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    )
  }
}
export default Login;
if (document.getElementById('login')) {
    ReactDOM.render(<Login />, document.getElementById('login'));
}